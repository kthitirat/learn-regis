<?php

namespace App\Http\Controllers;

use App\Actions\Dashboard\SavePerformanceAction;
use App\Actions\RegisterUserAction;
use App\Http\Services\LineNotifyService;
use App\Http\Transformers\PerformanceTransformer;
use App\Http\Requests\Dashboard\SavePerformanceDraftRequest;
use App\Http\Transformers\SubjectTransformer;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Performance;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\ArrayExporter;
use Maatwebsite\Excel\Facades\Excel;


class PageController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->only('search');
        $subjects = Subject::with('professors')
            ->filter($filters)
            ->whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->paginate(20);
        $subjectData = fractal($subjects, new SubjectTransformer())->includeImage()->toArray();
        return Inertia::render('Index')->with([
            'subjects' => $subjectData
        ]);
    }

    public function dashboard()
    {
        $user = Auth::user();
        return Inertia::render('Dashboard/Index')->with([
            'user' => $user,
            'number' => 9,
            'date' => "9-3-2567",
        ]);
    }

    public function userRegister()
    {
        return Inertia::render('Auth/Register');
    }

    public function storeRegister(Request $request, RegisterUserAction $userAction)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'confirmed'],
            'terms' => ['required', 'accepted'],
        ]);
        $newUser = $userAction->execute(new User(), $request->all());
        Auth::login($newUser);
        $lineNotify = new LineNotifyService();
        $lineNotify->execute('sjdhfgjsdhgf sdfhgds');
        return redirect()->route('index');
    }

    public function print()
    {
        $data = [
            'title' => 'สวัสดีครับ',
            'content' => 'นี่คือเอกสาร PDF ที่สร้างขึ้นโดยใช้ Laravel และ DomPDF รองรับภาษาไทย'
        ];

        $pdf = Pdf::loadView('pdf.document', $data);
        return $pdf->download('document.pdf');
    }

    public function export()
    {
        $data = [
            ['Name', 'Email', 'Created At'],
            ['John Doe', 'john@example.com', '2024-01-01'],
            ['Jane Smith', 'jane@example.com', '2024-01-02'],
        ];
        $lineNotify = new LineNotifyService();
        $lineNotify->execute('sjdhfgjsdhgf sdfhgds');
        return Excel::download(new ArrayExporter($data), 'test-export.xlsx');
    }

    public function form()
    {
        $performance = Performance::where('user_id', Auth::id())->first();      //ดึงข้อมูลรายการ Performance ของผู้ใช้ที่ล็อกอินอยู่” ออกมาหนึ่งรายการ (รายการแรกที่พบ)
        $performanceData = fractal($performance, new PerformanceTransformer())->toArray();
        return Inertia::render('Form')->with([
            'performance' => $performanceData
        ]);
    }

    public function saveDraft(SavePerformanceDraftRequest $request, SavePerformanceAction $action)
    {
        $userId = Auth::id();

        // ถ้ามี performance_id และเป็นของ user นี้ ใช้อันนั้น
        $performance = null;
        if ($request->filled('performance_id')) {
            $performance = Performance::where('id', $request->performance_id)
                ->where('user_id', $userId)
                ->first();
        }

        // ถ้าไม่มี ให้เอาของ user นี้ (เพราะ user_id unique => มีได้แค่ 1 แถว)
        if (!$performance) {
            $performance = Performance::firstOrCreate(['user_id' => $userId]);
        }

        $performance = $action->execute($performance, $request->validated());

        return response()->json([
            'performance_id' => $performance->id,
        ], 200);
    }













//    public function login()
//    {
//        return Inertia::render('Auth/Login');
//    }
//
//    public function doLogin(Request $request)
//    {
//        $request->only('email', 'password');
//        $user = User::where('email', $request->email)->first();
//        dd($request->all());
//    }
}

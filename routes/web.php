<?php
//  Pa$$w0rd!
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlpineController;
use App\Http\Controllers\AwearnessController;
use App\Http\Controllers\BiographyController;
use App\Http\Controllers\CallogeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeDashboardController;
use App\Http\Controllers\EmployeeReportController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\landScapeController;
use App\Http\Controllers\OutSidePresentorController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\PresentorController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ScientificWorkController;
use App\Http\Controllers\SlugController;
use App\Http\Controllers\SuggestionController;
use App\Http\Controllers\TeacherAccountController;
use App\Http\Controllers\TeacherCurrentJobController;
use App\Http\Controllers\TeacherDashboardController;
use App\Http\Controllers\TeacherEducationInfoController;
use App\Http\Controllers\TeacherInfoController;
use App\Http\Controllers\TeacherJobTraindeController;
use App\Http\Controllers\TeacherLangSkillController;
use App\Http\Controllers\TeacherReportController;
use App\Http\Controllers\TeacherReviewController;
use App\Http\Controllers\TeacherRewardController;
use App\Http\Controllers\TeacherScientificWork;
use App\Http\Controllers\TeacherServicesDurationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkShopController;
use App\Http\Controllers\WorkshopGraphReportController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[landScapeController::class,'index'])->name('landing');
Auth::routes();
Route::get('/print', function () {
    return view('print');
});
Route::middleware('auth')->group(function(){
    
    Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/create/admin/account',[HomeController::class,'adminAccount'])->name('admin.create.account');
    Route::resource('/collage', CallogeController::class);
    // listing the departments using livewire component 
    Route::get('/department', [DepartmentController::class, 'index'])->name('department.index');
    Route::patch('/department/{department}', [DepartmentController::class, 'update'])->name('department.update');
    // list all the user or teacher account using user controller 
    Route::get('/teacher', [UserController::class, 'index'])->name('teacher.index');
    Route::get('/teacher/compelete/info', [UserController::class, 'compelete'])->name('teacher.compelete.info');
    // using the default register form to create a teacher account in user table
    Route::get('/teacher/create', [UserController::class, 'create'])->name('teacher.create');
    Route::get('/teacher/{user}/edit', [UserController::class, 'edit'])->name('teacher.edit');
    Route::patch('/teacher/{user}', [UserController::class, 'update'])->name('teacher.update');
    Route::get('/teacher/{user:name}', [UserController::class, 'show'])->name('teacher.show');
    // compeleting the information route
    Route::get('/teacher/{user}/create', [TeacherInfoController::class, 'create'])->name('teacherInfo.create');
    Route::post('/teacher/{user}', [TeacherInfoController::class, 'store'])->name('teacherInfo.store');
    Route::get('/teacherInfo/{teacherInfo}/edit', [TeacherInfoController::class, 'edit'])->name('teacherInfo.edit');
    Route::patch('/teacherInfo/{teacherInfo}', [TeacherInfoController::class, 'update'])->name('teacherInfo.update');
    // end of compeleting information route
    // start of teacher current job route
    Route::middleware('admin')->group(function(){

        Route::get('/current/job/teacher/{teacherInfo}/create', [TeacherCurrentJobController::class, 'create'])
            ->name('teacherCurrentJob.create');
        Route::post('/current/job/teacher/{teacherInfo}', [TeacherCurrentJobController::class, 'store'])
            ->name('teacherCurrentJob.store');
        Route::get('/current/job/teacher/{teacherCurrentJob}/edit', [TeacherCurrentJobController::class, 'edit'])
            ->name('teacherCurrentJob.edit');
        Route::patch('/current/job/teacher/{teacherCurrentJob}', [TeacherCurrentJobController::class, 'update'])
            ->name('teacherCurrentJob.update');
        Route::delete('/teacherCurrentJob/delete',[TeacherCurrentJobController::class,'destory'])->name('teacherCurrentJob.delete');
        // end of teacher current job route 
        
        // start of teacher education information 
        Route::get('/education/info/{teacherInfo}/teacher', [TeacherEducationInfoController::class, 'create'])
            ->name('teacherEducationInfo.create');
        Route::post('/education/info/{teacherInfo}', [TeacherEducationInfoController::class, 'store'])
            ->name('teacherEducationInfo.store');
        Route::get('/education/info/{teacherEducationInfo}/teacher/edit', [TeacherEducationInfoController::class, 'edit'])
            ->name('teacherEducationInfo.edit');
        Route::patch('/education/info/{teacherEducationInfo}/teacher', [TeacherEducationInfoController::class, 'update'])
            ->name('teacherEducationInfo.update');
        Route::delete('/teacheEdictionInfo/delete',[TeacherEducationInfoController::class,'destroy'])->name('teacheEdictionInfo.delete');
        //  end of teacher education iformation 
        
        // start of teacher job trained skill route
        Route::get('/job/trained/teacher/{teacherInfo}', [TeacherJobTraindeController::class, 'create'])
            ->name('teacherJobTrained.create');
        Route::post('/job/trained/teacher/{teacherInfo}', [TeacherJobTraindeController::class, 'store'])
            ->name('teacherJobTrained.store');
        Route::get('/job/trained/teacher/{teacherJobTrainde}/edit', [TeacherJobTraindeController::class, 'edit'])
            ->name('teacherJobTrained.edit');
        Route::patch('/job/trained/teacher/{teacherJobTrainde}', [TeacherJobTraindeController::class, 'update'])
            ->name('teacherJobTrained.update');
        Route::delete('/teacherJobTraind/delete',[TeacherJobTraindeController::class,'destroy'])->name('teacherJobTraind.delete');
        // end of teacher job trained skill route
        // teacher language skills route
        Route::get('/lang/skill/{teacherInfo}/teacher', [TeacherLangSkillController::class, 'create'])
            ->name('teacherLangSkill.create');
        Route::post('/lang/skill/{teacherInfo}', [TeacherLangSkillController::class, 'store'])
            ->name('teacherLangSkill.store');
        Route::get('/lang/skill/{teacherLangSkill}/edit', [TeacherLangSkillController::class, 'edit'])
            ->name('teacherLangSkill.edit');
        Route::patch('/lang/skill/{teacherLangSkill}', [TeacherLangSkillController::class, 'update'])
            ->name('teacherLangSkill.update');
        Route::delete('/teacherLangSKill/delete',[TeacherLangSkillController::class,'destroy'])->name('teacherLangSKill.delete');
        // end of teacher language skills route
        // start of teacher reviwe route
        Route::get('/review/{teacherInfo}/teacher', [TeacherReviewController::class, 'create'])
            ->name('teacherReview.create');
        Route::post('/review/{teacherInfo}', [TeacherReviewController::class, 'store'])
            ->name('teacherReview.store');
        Route::get('/review/{teacherReview}/edit', [TeacherReviewController::class, 'edit'])
            ->name('teacherReview.edit');
        Route::patch('/review/{teacherReview}', [TeacherReviewController::class, 'update'])
            ->name('teacherReview.update');
        Route::delete('/teacherReview/delete',[TeacherReviewController::class,'destroy'])->name('teacherReview.delete');
        // end of teacher review route
        // start of teacher reward
        Route::get('/reward/{teacherInfo}/teacher', [TeacherRewardController::class, 'create'])
            ->name('teacherReward.create');
        Route::post('/reward/{teacherInfo}/', [TeacherRewardController::class, 'store'])
            ->name('teacherReward.store');
        Route::get('/reward/{teacherReward}/teacher/edit', [TeacherRewardController::class, 'edit'])
            ->name('teacherReward.edit');
        Route::patch('/reward/{teacherReward}/', [TeacherRewardController::class, 'update'])
            ->name('teacherReward.update');
        Route::delete('/teacherReward/delete',[TeacherRewardController::class,'destroy'])->name('teacherReward.delete');
        // end of teacher reward
        // teacher service duration route
        Route::get('/service/duration/{teacherInfo}/teacher', [TeacherServicesDurationController::class, 'create'])
            ->name('teacherServiceDuration.create');
        Route::post('/service/duration/{teacherInfo}', [TeacherServicesDurationController::class, 'store'])
            ->name('teacherServiceDuration.store');
        Route::get('/service/duration/{teacherServicesDuration}/edit', [TeacherServicesDurationController::class, 'edit'])
            ->name('teacherServiceDuration.edit');
        Route::patch('/service/duration/{teacherServicesDuration}', [TeacherServicesDurationController::class, 'update'])
            ->name('teacherServiceDuration.update');
        Route::delete('/teacherServiceDuration/delete',[TeacherServicesDurationController::class,'destroy'])
        ->name('teacherServiceDuration.delete');
        // end of teacher service duration route
        
        // start of employees route
        Route::get('/employee/compelete/info', [EmployeeController::class, 'compelete'])->name('employee.compelete.info');
        Route::get('/employee', [EmployeeController::class, 'index'])->name('employee.index');
        Route::get('/employee/{user}/create', [EmployeeController::class, 'create'])->name('employee.create');
        Route::post('/employee/{user}', [EmployeeController::class, 'store'])->name('employee.store');
        Route::get('/employee/{user}/edit', [EmployeeController::class, 'edit'])->name('employee.account.edit');
        Route::get('/admin/{user}/edit', [EmployeeController::class, 'edit'])->name('admin.account.edit');
        Route::get('/employee/{employee}/info/edit',[EmployeeController::class,'infoEdit'])->name('employee.info.edit');
        Route::patch('/employee/{employee}/info',[EmployeeController::class,'update'])->name('employee.info.update');
        Route::get('/employee/{employee}', [EmployeeController::class, 'show'])->name('employee.show');
        Route::patch('/employee/{user}', [UserController::class, 'update'])->name('employee.update');
        Route::delete('/employee/{employee}', [EmployeeController::class, 'destroy'])->name('employee.delete');
        // end of employees route
        // start of workshop route
        Route::get('/workshop', [WorkShopController::class, 'index'])->name('workshop.index');
        Route::get('/workshop/create', [WorkShopController::class, 'create'])->name('workshop.create');
        Route::post('/workshop', [WorkShopController::class, 'store'])->name('workshop.store');
        Route::get('/workshop/{workShop}/edit', [WorkShopController::class, 'edit'])->name('workshop.edit');
        Route::patch('/workshop/{workShop}', [WorkShopController::class, 'update'])->name('workshop.update');
        Route::get('/workshop/{workShop}', [WorkShopController::class, 'show'])->name('workshop.show');
        Route::delete('/workshop/delete',[WorkShopController::class,'destroy'])->name('workshop.delete');
        Route::get('/makaspresent/{workShop}',[WorkShopController::class,'maskAsPresent'])->name('workshop.mak.asPresent');
        Route::get('/presented/workshop', [WorkShopController::class, 'presented'])->name('workshop.presented.index');
        // end of workshop route
        // presentor route
        // Route::get('/presentor/{workShop}/workshop',[PresentorController::class,'index'])->name('presentor.index');
        // Route::get('/presentor/{workShop}/workshop/create',[PresentorController::class,'create'])->name('presentor.create');
        // end of presentor route
        // start of participante or presentor route
        // Route::post
        Route::get('/participant/presentor/{workshop}/workshop', [ParticipantController::class, 'index'])
            ->name('workshop.participate.present');
        Route::post('/presentor/{workShop}/teacherInfo', [PresentorController::class, 'teacherInfo'])
            ->name('workshop.present.teacherInfo');
        Route::post('/presentor/{workShop}/employee', [PresentorController::class, 'employee'])
            ->name('workshop.present.employee');
        
        Route::post('/participant/{workShop}/teacherInfo', [ParticipantController::class, 'teacherInfo'])
            ->name('workshop.participate.teacherInfo');
        Route::post('/participant/{workShop}/employee', [ParticipantController::class, 'employee'])
            ->name('workshop.participate.employee');
        // end of participante or presentor route 
        // start of outside presentor route
        Route::get('/outSidePresentor', [OutSidePresentorController::class, 'index'])->name('outSidePresentor.index');
        Route::get('/outSidePresentor/{workshop}/create', [OutSidePresentorController::class, 'create'])
            ->name('outSidePresentor.create');
        Route::post('/outSidePresentor/{workshop}', [OutSidePresentorController::class, 'store'])
            ->name('outSidePresentor.store');
        Route::get('/outSidePresentor/{outsidepresentor}/edit', [OutSidePresentorController::class, 'edit'])
            ->name('outSidePresentor.edit');
        Route::patch('/outSidePresentor/{outsidepresentor}', [OutSidePresentorController::class, 'update'])
            ->name('outSidePresentor.update');
        Route::get('/outSidePresentor/{outsidepresentor}', [OutSidePresentorController::class, 'show'])
            ->name('outSidePresentor.show');
        // end of outside presentor route
        
        // start of  workshop awearness or informing a teacher(s) or employee(s) from a workshop title route
        Route::get('/awearness/{workshop}/awearness', [AwearnessController::class, 'index'])->name('awearness.index');
        Route::post('/awearness/{workshop}/teacher', [AwearnessController::class, 'teacher'])->name('awearness.teacher.store');
        Route::post('/awearness/{wokrshop}/employee', [AwearnessController::class, 'employee'])->name('awearness.employee.store');
        // end of workshop awearness route
        // Route::resource('/biography',BiographyController::class);
        // start of biography route 
        Route::get('/biography', [BiographyController::class, 'index'])->name('biography.index');
        Route::get('/biography/{teacherInfo}/teacher', [BiographyController::class, 'teacherInfo'])->name('teacherInfo.biography.create');
        Route::get('/biography/{employee}/employee', [BiographyController::class, 'employee'])->name('employee.biography.create');
        Route::post('/biography/{teacherInfo}/teacher', [BiographyController::class, 'teacherInfo'])->name('teacherInfo.biography.store');
        Route::post('/biography/{employee}/employee', [BiographyController::class, 'employee'])->name('employee.biography.store');
        // end of biography route
        // start of teacher Workshop report  
        Route::get('/teacher/{teacherinfo}/report', [TeacherReportController::class, 'index'])->name('teacher.report.workshop');
        // end of teacher workshop report  
        // start of employee workshop report route
        Route::get('/employee/{employee}/report', [EmployeeReportController::class, 'index'])->name('employee.report.workshop');
        // end of employee workshop report route
    });

    
    // start of scientific work route 
    Route::get('/scientific', [ScientificWorkController::class, 'index'])->name('scientific.index');
    Route::get('/scientific/create', [ScientificWorkController::class, 'create'])->name('scientific.create');
    Route::post('/scientific', [ScientificWorkController::class, 'store'])->name('scientific.store');
    Route::get('/showScientificWork/{scientificWork}', [ScientificWorkController::class, 'showScientificWork'])
    ->name('showScientificWork');
    Route::get('/scientific/{scientificWork}', [ScientificWorkController::class, 'edit'])->name('scientific.edit');
    Route::patch('/scientific/{scientificWork}', [ScientificWorkController::class, 'update'])->name('scientific.update');
    // end of scientific work route
    
    // start of suggestion route 
    Route::get('/suggestion', [SuggestionController::class, 'index'])->name('suggestion.index');
    Route::post('/suggestion', [SuggestionController::class, 'store'])->name('suggestion.store');
    Route::patch('/suggestion/{suggestion}', [SuggestionController::class, 'update'])->name('suggestion.update');
    Route::get('/suggestion/employee',[SuggestionController::class, 'suggestionEmployee'])->name('suggestion.employee.index');
    // end of suggestion route
    Route::get('/bk', [AlpineController::class, 'bk'])->name('alpine.index');
    Route::get('/slug', [SlugController::class, 'index']);
    Route::get('/slug/create', [SlugController::class, 'create']);
    Route::post('/slug', [SlugController::class, 'store']);
    Route::get('/slug/{id}/{slug}', [SlugController::class, 'show']);
    
    // TeacherDashboardController
    // Route::get('/teacher/dashboard', [TeacherDashboardController::class, 'dasbhoard'])->name('teacher.dashboard');
    Route::get('/dashboard/teacher', [TeacherDashboardController::class, 'dasbhoard'])->name('dashboard.teacher');
    // displaying total workshop which a teacher participated 
    Route::get('/workshop/report/participate/teacher', [TeacherDashboardController::class, 'participate'])
        ->name('workshop.report.participate');
    // end
    // displaying total workshop which a teacher presented 
    Route::get('/workshop/report/present/teacher', [TeacherDashboardController::class, 'present'])
        ->name('workshop.report.present');
    // end
    // end of TeacherDashboardController
    
    //
    Route::get('/workshop/report/participate/employee', [EmployeeDashboardController::class, 'participate'])
        ->name('workshop.report.participate.employee');
    
    // displaying total workshop which a teacher presented 
    Route::get('/workshop/report/present/employee', [EmployeeDashboardController::class, 'present'])
        ->name('workshop.report.present.employee');
    // end
    //
    
    // displaying scientific works of teachers for admin
    Route::get('/all/scientificwork/teacher', [TeacherScientificWork::class, 'index'])->name('all.scientific.work.index');
    // Route::get('/all/scientificwork/{user}/teacher', [TeacherScientificWork::class, 'show'])->name('scientificwork.show');
    Route::get('/all/scientificwork/{user}', [TeacherScientificWork::class, 'show'])->name('scientificwork.show');
    
    // end of displaying scientific works of teacher for admin
    
    // displaying scientific works of employee for admin
    Route::get('/employeeAll/scientificwork', [TeacherScientificWork::class, 'employeeIndex'])
        ->name('all.scientific.employee.work.index');
    Route::get('/employeeAll/scientificwork/{employee}/employee', [TeacherScientificWork::class, 'employeeShow'])
        ->name('scientific.employee.work.show');
    //  end of displaying scientific works of employee for admin
    
    // start of  account routing 
    Route::get('/active/teacher/account', [AccountController::class, 'teacherActive'])->name('active.account.teacher.index');
    Route::delete('/inactive/{user}', [AccountController::class, 'deActivting'])->name('deactive.account.teacher.delete');
    Route::get('/deActive', [AccountController::class, 'deActive'])->name('deActive.account.teacher.index');
    
    Route::get('/active/employee/account', [AccountController::class, 'employeeActive'])->name('employee.acount.active.index');
    Route::get('/deActive/employee/account', [AccountController::class, 'deActiveEmployee'])->name('employee.deActive.account.index');
    
    Route::get('/admin/active/account', [AccountController::class, 'adminActive'])->name('admin.active.account.index');
    Route::get('/admin/deActive/account', [AccountController::class, 'adminDeActive'])->name('admin.deActive.account.index');
    
    Route::get('/register/admin', [AdminController::class, 'admin'])->name('register.admin');
    Route::get('/register/employee', [AdminController::class, 'employee'])->name('register.employee');
    
    
    // Route::get('/active/account/teacher',[AccountController::class,'teacherActive'])->name('active.teacher');
    // end of account routing
    
    Route::get('/dashboard/employee', [EmployeeDashboardController::class, 'index'])->name('dashboard.employee');
    Route::get('/workshops', [AdminController::class, 'allWorkshop'])->name('workshop.all.index');
    Route::post('/workshops/{workShop}', [ParticipantController::class, 'singleParticipant'])->name('workshops.store.singleParticipant');
});
// route of displaying things on public view
Route::get('/workshop_list', [PublicController::class, 'workshops'])->name('public.workshop.index');
Route::get('/workshop_list/{workShop}', [PublicController::class, 'workshopShow'])->name('public.workshop.show');
Route::get('/allScientificWork',[PublicController::class,'allScientificWork'])->name('public.allScientificWork');
Route::get('/allScientificWork/{user}/view',[PublicController::class,'user'])->name('public.allScientificWork.show.user');
Route::get('/graph/month',[WorkshopGraphReportController::class,'month'])->name('graph.month');
Route::get('/graph/year',[WorkshopGraphReportController::class,'year'])->name('graph.year');

Route::get('/noneGraphYearlyReport',[WorkshopGraphReportController::class,'noneGraphYearlyReport'])->name('noneGraphYearlyReport');
Route::get('/noneGraphMonthlyReport',[WorkshopGraphReportController::class,'noneGraphMonthlyReport'])->name('noneGraphMonthlyReport');
// end
<?php

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



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function() {
	Route::get('hr/home', array('as' => 'hr.home', 'uses' => 'HrController@index'));
	Route::get('hr/employees', array('as' => 'hr.employees', 'uses' => 'HrController@employees'));
	Route::get('hr/create-employee', array('as' => 'hr.create_employee', 'uses' => 'HrController@create_employee'));
	Route::post('hr/create-employee-store', array('as' => 'hr.create_employee_store', 'uses' => 'HrController@store_employee'));
	Route::get('hr/edit-employee/{id}', array('as' => 'hr.edit_employee', 'uses' => 'HrController@edit_employee'));
	Route::post('hr/edit-employee-store/{id}', array('as' => 'hr.edit_employee_store', 'uses' => 'HrController@store_edit_employee'));
	Route::get('hr/inact-employee/{id}', array('as' => 'hr.inact_employee', 'uses' => 'HrController@inactivate_employee'));
	Route::get('hr/activate-employee/{id}', array('as' => 'hr.act_employee', 'uses' => 'HrController@activate_employee'));
	Route::get('hr/inactive-employees', array('as' => 'hr.inactive_employees', 'uses' => 'HrController@inactive_employees'));
	Route::post('hr/group-employee/{id}', array('as' => 'hr.group_employee', 'uses' => 'HrController@add_to_group'));

	Route::get('hr/groups', array('as' => 'hr.groups', 'uses' => 'HrController@groups'));
	Route::get('hr/create-group', array('as' => 'hr.create_group', 'uses' => 'HrController@create_group'));
	Route::post('hr/create-group-store', array('as' => 'hr.create_group_store', 'uses' => 'HrController@store_group'));
	Route::get('hr/edit-group/{id}', array('as' => 'hr.edit_group', 'uses' => 'HrController@edit_group'));
	Route::post('hr/edit-group-store/{id}', array('as' => 'hr.edit_group_store', 'uses' => 'HrController@store_edit_group'));
	Route::get('hr/delete-group/{id}', array('as' => 'hr.delete_group', 'uses' => 'HrController@delete_group'));
	Route::get('hr/group-members/{id}', array('as' => 'hr.group_members', 'uses' => 'HrController@group_members'));
	Route::post('hr/group-from-employee/{id}/{gid}', array('as' => 'hr.from_group_employee', 'uses' => 'HrController@add_from_group'));
	Route::get('hr/make-manager/{id}/{uid}', array('as' => 'hr.make_manager', 'uses' => 'HrController@make_manager'));
	Route::post('hr/add-group/{id}', array('as' => 'hr.add_group', 'uses' => 'HrController@add_group'));
	Route::get('hr/remove-group/{id}/{gid}', array('as' => 'hr.remove_group', 'uses' => 'HrController@remove_from_group'));

	Route::get('hr/documents', array('as' => 'hr.documents', 'uses' => 'HrController@documents'));
	Route::get('hr/my-documents', array('as' => 'hr.my_docs', 'uses' => 'HrController@my_docs'));
	Route::get('hr/add-document', array('as' => 'hr.add_document', 'uses' => 'HrController@add_doc'));
	Route::get('hr/edit-document/{id}', array('as' => 'hr.edit_document', 'uses' => 'HrController@edit_doc'));
	Route::get('hr/view-document/{id}', array('as' => 'hr.view_document', 'uses' => 'HrController@view_document'));
	Route::post('hr/add-document-store', array('as' => 'hr.add_document_store', 'uses' => 'HrController@doc_store'));
	Route::post('hr/edit-document-store/{id}', array('as' => 'hr.edit_document_store', 'uses' => 'HrController@edit_doc_store'));
	Route::get('hr/delete-doc/{id}', array('as' => 'hr.delete_document', 'uses' => 'HrController@delete_document'));

	Route::get('hr/awards', array('as' => 'hr.awards', 'uses' => 'HrController@awards'));
	Route::get('hr/add-award', array('as' => 'hr.add_award', 'uses' => 'HrController@add_award'));
	Route::get('hr/edit-award/{id}', array('as' => 'hr.edit_award', 'uses' => 'HrController@edit_award'));
	Route::get('hr/view-award/{id}', array('as' => 'hr.view_award', 'uses' => 'HrController@view_award'));
	Route::post('hr/add-award-store', array('as' => 'hr.add_award_store', 'uses' => 'HrController@award_store'));
	Route::post('hr/edit-award-store/{id}', array('as' => 'hr.edit_award_store', 'uses' => 'HrController@edit_award_store'));
	Route::get('hr/delete-award/{id}', array('as' => 'hr.delete_award', 'uses' => 'HrController@delete_award'));

	Route::get('hr/leave-requests', array('as' => 'hr.leave_requests', 'uses' => 'HrController@leave_request'));
	Route::get('hr/approved-leaves', array('as' => 'hr.approved_leaves', 'uses' => 'HrController@approved_leaves'));
	Route::get('hr/rejected-leaves', array('as' => 'hr.rejected_leaves', 'uses' => 'HrController@rejected_leaves'));
	Route::get('hr/leave-accept/{id}', array('as' => 'hr.leave_accept', 'uses' => 'HrController@leave_accept'));
	Route::post('hr/leave-reject/{id}', array('as' => 'hr.leave_reject', 'uses' => 'HrController@leave_reject'));
	Route::get('hr/view-leave/{id}', array('as' => 'hr.view_leave', 'uses' => 'HrController@view_leave_doc'));

	Route::get('hr/salary', array('as' => 'hr.salary', 'uses' => 'HrController@salary'));
	Route::get('hr/{eid}/employee-profile', array('as' => 'hr.employee_profile', 'uses' => 'HrController@profile'));
	Route::get('hr/{eid}/salary-slip', array('as' => 'hr.salary_slip', 'uses' => 'HrController@salary_slip'));

	Route::get('hr/salary-slip', array('as' => 'hr.slip', 'uses' => 'HrController@slip'));
	Route::get('hr/view-salary_slip/{id}', array('as' => 'hr.view_salary_slip', 'uses' => 'HrController@view_salary_slip'));

	Route::get('hr/salary-expenses', array('as' => 'hr.expense', 'uses' => 'HrController@expense'));

	Route::get('hr/holidays', array('as' => 'hr.holiday', 'uses' => 'HrController@holiday'));
	Route::get('hr/add-holiday', array('as' => 'hr.add_holiday', 'uses' => 'HrController@add_holiday'));
	Route::post('hr/holiday-store', array('as' => 'hr.store_holiday', 'uses' => 'HrController@holiday_store'));
	Route::get('hr/edit-holiday/{id}', array('as' => 'hr.edit_holiday', 'uses' => 'HrController@edit_holiday'));
	Route::post('hr/edit-holiday-store/{id}', array('as' => 'hr.edit_holiday_store', 'uses' => 'HrController@edit_holiday_store'));
	Route::get('hr/delete-holiday/{id}', array('as' => 'hr.delete_holiday', 'uses' => 'HrController@delete_holiday'));

	//hr - change password
    Route::get('hr/change-password', array('as' => 'hr.change_password', 'uses' => 'HrController@change_password'));
    Route::post('hr/change-password/store', array('as' => 'hr.change_password.store', 'uses' => 'HrController@change'));


	Route::get('/downloadPDF/{eid}',array('as' => 'pdf.download', 'uses' => 'PDFController@downloadPDF'));

	Route::get('employee/home', array('as' => 'employee.home', 'uses' => 'EmployeeController@index'));
	Route::get('employee/leaves', array('as' => 'employee.leaves', 'uses' => 'EmployeeController@leaves'));
	Route::get('employee/approved-leaves', array('as' => 'employee.approved_leaves', 'uses' => 'EmployeeController@approved_leaves'));
	Route::get('employee/rejected-leaves', array('as' => 'employee.rejected_leaves', 'uses' => 'EmployeeController@reject_leaves'));
	Route::get('employee/request-leave', array('as' => 'employee.request_leave', 'uses' => 'EmployeeController@request_leave'));
	Route::post('employee/leave-request-store', array('as' => 'employee.request_leave_store', 'uses' => 'EmployeeController@leave_store'));
	Route::get('employee/view-leave/{id}', array('as' => 'employee.view_leave', 'uses' => 'EmployeeController@view_leave_doc'));
	Route::get('employee/groups', array('as' => 'employee.groups', 'uses' => 'EmployeeController@groups'));
	Route::get('employee/group-members/{id}', array('as' => 'employee.group_members', 'uses' => 'EmployeeController@group_members'));
	Route::get('employee/group-members/{id}', array('as' => 'employee.group_members', 'uses' => 'EmployeeController@group_members'));
	Route::get('employee/remove-group/{id}/{gid}', array('as' => 'employee.remove_group', 'uses' => 'EmployeeController@remove_from_group'));

	Route::get('employee/leave-requests/{id}/{eid}', array('as' => 'employee.leave_requests', 'uses' => 'EmployeeController@leave_requests'));
	Route::get('employee/leave-accept/{id}/{gid}', array('as' => 'employee.leave_accept', 'uses' => 'EmployeeController@leave_accept'));
	Route::post('employee/leave-reject/{id}/{gid}', array('as' => 'employee.leave_reject', 'uses' => 'EmployeeController@leave_reject'));

	Route::get('employee/documents', array('as' => 'employee.documents', 'uses' => 'EmployeeController@documents'));
	Route::get('employee/view-document/{id}', array('as' => 'employee.view_document', 'uses' => 'EmployeeController@view_document'));
	Route::get('employee/delete-doc/{id}', array('as' => 'employee.delete_document', 'uses' => 'EmployeeController@delete_document'));

	Route::get('employee/salary_slip', array('as' => 'employee.salary_slip', 'uses' => 'EmployeeController@salary_slip'));
	Route::get('employee/view-salary_slip/{id}', array('as' => 'employee.view_salary_slip', 'uses' => 'EmployeeController@view_salary_slip'));

	Route::get('employee/profile', array('as' => 'employee.profile', 'uses' => 'EmployeeController@profile'));

	Route::get('employee/holidays', array('as' => 'employee.holidays', 'uses' => 'EmployeeController@holidays'));

	//employee - change password
    Route::get('employee/change-password', array('as' => 'employee.change_password', 'uses' => 'EmployeeController@change_password'));
    Route::post('employee/change-password/store', array('as' => 'employee.change_password.store', 'uses' => 'EmployeeController@change'));

	Route::get('get-employee', array('as' => 'user.get_employee', 'uses' => 'HrController@get_employee'));

	Route::get('/', array('as' => 'main.home', 'uses' => 'MainController@index'));
});
Route::get('/clear-cache', function() {
    Artisan::call('config:cache');
    return "Cache is cleared";
})->name('clear.cache');

Route::get('/clear-route', function() {
    Artisan::call('route:cache');
    return "Routes cleared";
})->name('clear.route');

Route::get('/clear-view', function() {
    Artisan::call('view:clear');
    return "Views cleared";
})->name('clear.view');

Route::get('employee/delete', array('as' => 'employee.delete', 'uses' => 'HrController@delete_employee'));
Route::get('salary/delete', array('as' => 'salary.delete', 'uses' => 'HrController@delete_salary'));
Route::get('user/delete', array('as' => 'user.delete', 'uses' => 'MainController@delete_user'));
Route::get('company/create', array('as' => 'company.create', 'uses' => 'MainController@create_company'));
Route::get('group/show', array('as' => 'group.show', 'uses' => 'MainController@group'));
Route::get('desklog', array('as' => 'desklog.show', 'uses' => 'MainController@desklog'));
Route::get('desklog/productive', array('as' => 'desklog.productive', 'uses' => 'MainController@productive'));
Route::get('week/productive', array('as' => 'week.productive', 'uses' => 'MainController@week_productive'));
Route::get('salary/slip', array('as' => 'salary.slip', 'uses' => 'MainController@leave_split'));
Route::get('salary-slip', array('as' => 'salary-slip', 'uses' => 'MainController@salary_slip'));
Route::get('salary-email', array('as' => 'salary-email', 'uses' => 'MainController@salary_email'));
Route::get('salary-date', array('as' => 'salary-date', 'uses' => 'MainController@sal_date'));
Route::get('cmp', array('as' => 'cmp', 'uses' => 'MainController@cmp'));
Route::get('user-update', array('as' => 'user-update', 'uses' => 'MainController@user_update'));


Route::get('pdf/salary-slip', array('as' => 'pdf.salary-slip', 'uses' => 'MainController@pdf'));
Route::get('api/fetch', array('as' => 'api.fetch', 'uses' => 'DesklogApiController@load_api'));
Route::get('api/users-fetch', array('as' => 'api.users-fetch', 'uses' => 'DesklogApiController@desklog_users'));
Route::get('api', array('as' => 'api', 'uses' => 'DesklogApiController@api'));
Route::get('users_api', array('as' => 'user.usersapi', 'uses' => 'ApiController@api'));


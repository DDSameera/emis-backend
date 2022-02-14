<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Http\Resources\EmployeeCollection;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use JsonResponseHandler;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $employee = Employee::with('salary', 'title')->get();
        if ($employee) {
            return JsonResponseHandler:: successResponse("List of All Employees", $employee);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(EmployeeRequest $request)
    {
        $employee = Employee::create($request->validated());
        if ($employee) {
            return JsonResponseHandler:: successResponse("Employee Created Successfully", new EmployeeResource($employee));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $employee = Employee::with('salary', 'title')->where('id',$id)->get();
        return JsonResponseHandler:: successResponse("Employee Information", $employee);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(EmployeeRequest $request, $id)
    {
        $employee = Employee::findOrFail($id);

        if ($employee) {

            $employee = $employee->update($request->validated());

            if ($employee) {
                $employee = Employee::findOrFail($id);

                return JsonResponseHandler:: successResponse("Employee Updated Successfully", new EmployeeResource($employee));

            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}

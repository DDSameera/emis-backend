<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalaryRequest;
use App\Http\Resources\SalaryResource;
use App\Models\Salary;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use JsonResponseHandler;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
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
    public function store(SalaryRequest $request)
    {
        $salary = Salary::create($request->validated());
        if ($salary) {
            return JsonResponseHandler:: successResponse("Employee Created Successfully", new SalaryResource($salary));
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
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $salary = Salary::findOrFail($id);

        if ($salary) {

            $salary = $salary->delete();

            if ($salary) {
                return JsonResponseHandler:: successResponse("Employer Salary Details Deleted Successfully", []);

            }
        }
    }
}

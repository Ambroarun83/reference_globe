<div id="emp_div">
    <div class="col-12" style="text-align:right;padding-bottom:10px;">
        <button class="btn btn-success" id="add_emp">Add Employee</button>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <div style="display:flex;justify-content:space-between;">
                    <b>Employee Table</b>
                    <div>
                        <label for="search">Search</label>
                        <input type="search" name="search" id="search">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="col-12">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-8 col-sm-6 col-12">
                        <table id="employeeTable" class="table table-bordered table-responsive">
                            <thead>
                                <th>S NO</th>
                                <th>Emp. Name</th>
                                <th>Designation</th>
                                <th>DOB</th>
                                <th>DOJ</th>
                                <th>Mobile</th>
                                <th>Address</th>
                                <th>Blood Group</th>
                                <th>ID Proof</th>
                                <th>Action</th>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer"></div>
    </div>
</div>
<div id="add_emp_div" style="display:none">
    <div class="col-12" style="text-align:right;padding-bottom:10px;">
        <button class="btn btn-dark" id="emp_list">Back</button>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="card-title"><b>Add Employee</b></div>
        </div>
        <input type="hidden" name="emp_id" id="emp_id">
        <input type="hidden" name="old_proof" id="old_proof">
        <form id="add_emp_form" method="post" enctype="multipart/form-data">
            <div class="card-body">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-8 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="emp_name">Employee Name&nbsp;<span class="text-danger">*</span></label>
                                        <input class="form-control mb-3" type="text" name="emp_name" id="emp_name" placeholder="Enter Employee Name" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-8 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="designation">Designation&nbsp;<span class="text-danger">*</span></label>
                                        <input class="form-control mb-3" type="text" name="designation" id="designation" placeholder="Enter Designation">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-8 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="dob">Date of Birt&nbsp;<span class="text-danger">*</span></label>
                                        <input class="form-control mb-3" type="date" name="dob" id="dob">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-8 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="doj">Date of Joining&nbsp;<span class="text-danger">*</span></label>
                                        <input class="form-control mb-3" type="date" name="doj" id="doj">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-8 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="blood_group">Blood Group&nbsp;<span class="text-danger">*</span></label>
                                        <input class="form-control mb-3" type="text" name="blood_group" id="blood_group" placeholder="Enter Blood Group" />
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-8 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="mobile">Mobile&nbsp;<span class="text-danger">*</span></label>
                                        <input class="form-control mb-3" type="number" name="mobile" id="mobile" placeholder="Enter Mobile Number" onkeypress="if(this.value.length == 10) return false;" />
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-8 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="email">Email&nbsp;<span class="text-danger">*</span></label>
                                        <input class="form-control mb-3" type="email" name="email" id="email" placeholder="Enter Email" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-8 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="address">Address&nbsp;<span class="text-danger">*</span></label>
                                        <input class="form-control mb-3" name="address" id="address" placeholder="Enter Address" />
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-8 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="proof">ID Proof</label>
                                        <input class="form-control mb-3" type="file" name="proof" id="proof" accept="image/*">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="col-12" style="text-align:right;">
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="src/js/emp.js"></script>
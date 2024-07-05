<div id="user_div">
    <div class="col-12" style="text-align:right;padding-bottom:10px;">
        <button class="btn btn-success" id="add_user">Add User</button>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="card-title"><b>Users Table</b></div>
        </div>
        <div class="card-body">
            <div class="col-12">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-8 col-sm-6 col-12">
                        <table id="usersTable" class="table table-bordered table-responsive">
                            <thead>
                                <th>S NO</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Role</th>
                                <th>Action</th>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="add_user_div" style="display:none">
    <div class="col-12" style="text-align:right;padding-bottom:10px;">
        <button class="btn btn-dark" id="user_list">Back</button>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="card-title"><b>Add User</b></div>
        </div>
        <input type="hidden" name="user_id" id="user_id">
        <form id="add_user_form" method="post" enctype="multipart/form-data">
            <div class="card-body">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-8 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="role">Role&nbsp;<span class="text-danger">*</span></label>
                                        <select class="form-control mb-3" name="role" id="role">
                                            <option value="">Select Role</option>
                                            <option value="Super Admin">Super Admin</option>
                                            <option value="Admin">Admin</option>
                                            <option value="User">User</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-8 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="name">Name&nbsp;<span class="text-danger">*</span></label>
                                        <input class="form-control mb-3" type="text" name="name" id="name" placeholder="Enter Name" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-8 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="password">Password&nbsp;<span class="text-danger">*</span></label>
                                        <input class="form-control mb-3" type="password" name="password" id="password" placeholder="Enter Password">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-8 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="mobile">Mobile&nbsp;<span class="text-danger">*</span></label>
                                        <input class="form-control mb-3" type="number" name="mobile" id="mobile" placeholder="Enter Mobile" autocomplete="off" onkeypress="if(this.value.length == 10) return false;">
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
                                        <input class="form-control mb-3" name="address" id="address" placeholder="Enter Address"></input>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-8 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="gender">Gender&nbsp;<span class="text-danger">*</span></label>
                                        <select class="form-control mb-3" name="gender" id="gender">
                                            <option value="">Select Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-8 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="dob">Date of Birth&nbsp;<span class="text-danger">*</span></label>
                                        <input class="form-control mb-3" type="date" name="dob" id="dob">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-8 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="profile_picture">Profile Picture</label>
                                        <input class="form-control mb-3" type="file" name="profile_picture" id="profile_picture" accept="image/*">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-8 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="signature">Signature</label>
                                        <input class="form-control mb-3" type="file" name="signature" id="signature" accept="image/*">
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
                        <input type="submit" id="submit_user" class="btn btn-primary" value="Submit">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


<script src="src/js/user.js"></script>
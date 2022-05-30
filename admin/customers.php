<?php 

//include('../middleware/adminMiddleware.php');
include('includes/header.php');


?>
                <div class="container-fluid">
                <div class="d-sm-flex justify-content-between align-items-center mb-4">
                    <h3 class="text-dark mb-4">Customer's List</h3><a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="#" style="background: rgb(255,128,64);border-style: none;"  id="addbtn" onclick="openForm()">&nbsp;Add Customer</a>
                    <div class="form-popup" id="myForm">
                            <form name="form" class="form-container">
                                <h3>Register Customer</h3>
                 <!-- Input Username -->
        <div class="column">
            <input type="text" name='username' required placeholder="Username" class="input"/>    
        </div>
        <!-- Input Email Address -->
        <div class="column">
            <input type="text" name='email' required placeholder="Email Address" class="input"/>    
        </div>
        <!-- Input Firstname -->
        <div class="column">
            <input type="text" name='firstname' required placeholder="Firstname" class="input"/>
        </div>
        <!-- Input Lastname -->
        <div class="column">
            <input type="text" name='lastname' required placeholder="Lastname" class="input"/>
        </div>
         <!-- Input Age -->
         <div class="column">
            <input type="text" name='age' required placeholder="Age" class="input"/>
        </div>
        <!-- Input Phone Number -->
        <div class="column">
            <input type="text" name='phonenumber' required placeholder="Phone Number" class="input"/>
        </div>
        <!-- Input Address -->
        <div class="column">
            <input type="text" name='address' required placeholder="Address" class="input"/>
        </div>
        <!-- Input Password -->
        <div class="column">
            <input type="password" name='password' required placeholder="Password" class="input"/>
        </div>
        <!-- Input Confirm Password -->
        <div class="column">
            <input type="password" name='confirmpassword' required placeholder="Confirm Password" class="input"/>
        </div> 
        <div class="column">
            <form action="/action_page.php"> 
                    <label for="img">Select Image:</label> </br>
                    <input type="file" id="img" name="img" accept="image/*">
                <button type="submit" name="register" class="busi_reg-btn" >REGISTER</button> <br> <br>
                                <div><button type="button" class="btn cancel" onclick="closeForm()">Close</button></div>
                            </form>
            </form>
        </div>
                        </div>
                        <script>
                        function openForm() {
                            document.getElementById("myForm").style.display = "block";
                        }
                        function closeForm() {
                            document.getElementById("myForm").style.display = "none";
                        }
                        </script>
                </div>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold" style="color: rgb(255,128,64);">Customers Info</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 text-nowrap">
                                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><label class="form-label">Show&nbsp;<select class="d-inline-block form-select form-select-sm">
                                                <option value="10" selected="">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>&nbsp;</label></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-md-end dataTables_filter" id="dataTable_filter"><label class="form-label"><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div>
                                </div>
                            </div>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email Address</th>
                                            <th>Address</th>
                                            <th>Age</th>
                                            <th>Visit Date</th>
                                            <th style="width: 103.922px;">Total Order</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar1.jpeg">Airi Satou</td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>
                                            <td>33</td>
                                            <td>2008/11/28</td>
                                            <td>$162,700</td>
                                        </tr>
                                        <tr>
                                            <td><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar2.jpeg">Angelica Ramos</td>
                                            <td>Chief Executive Officer(CEO)</td>
                                            <td>London</td>
                                            <td>47</td>
                                            <td>2009/10/09<br></td>
                                            <td>$1,200,000</td>
                                        </tr>
                                        <tr>
                                            <td><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar3.jpeg">Ashton Cox</td>
                                            <td>Junior Technical Author</td>
                                            <td>San Francisco</td>
                                            <td>66</td>
                                            <td>2009/01/12<br></td>
                                            <td>$86,000</td>
                                        </tr>
                                        <tr>
                                            <td><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar4.jpeg">Bradley Greer</td>
                                            <td>Software Engineer</td>
                                            <td>London</td>
                                            <td>41</td>
                                            <td>2012/10/13<br></td>
                                            <td>$132,000</td>
                                        </tr>
                                        <tr>
                                            <td><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar5.jpeg">Brenden Wagner</td>
                                            <td>Software Engineer</td>
                                            <td>San Francisco</td>
                                            <td>28</td>
                                            <td>2011/06/07<br></td>
                                            <td>$206,850</td>
                                        </tr>
                                        <tr>
                                            <td><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar1.jpeg">Brielle Williamson</td>
                                            <td>Integration Specialist</td>
                                            <td>New York</td>
                                            <td>61</td>
                                            <td>2012/12/02<br></td>
                                            <td>$372,000</td>
                                        </tr>
                                        <tr>
                                            <td><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar2.jpeg">Bruno Nash<br></td>
                                            <td>Software Engineer</td>
                                            <td>London</td>
                                            <td>38</td>
                                            <td>2011/05/03<br></td>
                                            <td>$163,500</td>
                                        </tr>
                                        <tr>
                                            <td><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar3.jpeg">Caesar Vance</td>
                                            <td>Pre-Sales Support</td>
                                            <td>New York</td>
                                            <td>21</td>
                                            <td>2011/12/12<br></td>
                                            <td>$106,450</td>
                                        </tr>
                                        <tr>
                                            <td><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar4.jpeg">Cara Stevens</td>
                                            <td>Sales Assistant</td>
                                            <td>New York</td>
                                            <td>46</td>
                                            <td>2011/12/06<br></td>
                                            <td>$145,600</td>
                                        </tr>
                                        <tr>
                                            <td><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar5.jpeg">Cedric Kelly</td>
                                            <td>Senior JavaScript Developer</td>
                                            <td>Edinburgh</td>
                                            <td>22</td>
                                            <td>2012/03/29<br></td>
                                            <td>$433,060</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td><strong>Name</strong></td>
                                            <td><strong>Email Address</strong></td>
                                            <td><strong>Address</strong></td>
                                            <td><strong>Age</strong></td>
                                            <td><strong>Visit Date</strong></td>
                                            <td><strong>Total Order</strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-6 align-self-center">
                                    <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Showing 1 to 10 of 27</p>
                                </div>
                                <div class="col-md-6">
                                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                        <ul class="pagination">
                                            <li class="page-item disabled"><a class="page-link" aria-label="Previous" href="#"><span aria-hidden="true">«</span></a></li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" aria-label="Next" href="#"><span aria-hidden="true">»</span></a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php 

//include('../middleware/adminMiddleware.php');
include('includes/footer.php');


?>
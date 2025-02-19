<!DOCTYPE html>
<html lang="en">

<head>
    <?php include"header.php" ?>
</head>

<body>
    
	<?php include"topnav.php"?>
<!-- Registration Start -->
    <div class="container-fluid bg-registration py-5">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-5 mb-lg-0">
                    <div class="mb-4">
                        <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Need Any Courses</h5>
                        <h1 class="text-white">30% Off For New Students</h1>
                    </div>
                    <p class="text-white"> It was the one of the best International School</p>
                    <ul class="list-inline text-white m-0">
                        <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Best Education From Your Home</li>
                        <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Best Online Learning Platform</li>
                        <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>New Way To Learn From Home</li>
                    </ul>
                </div>
                <div class="col-lg-5">
                    <div class="card border-0">
                        <div class="card-header bg-light text-center p-4">
                            <h1 class="m-0">Now Join</h1>
                        </div>
                        <div class="card-body rounded-bottom bg-primary p-5">
                            <form>
                                <div class="form-group">
                                    <input type="text" class="form-control border-0 p-4" placeholder="Student name" required="required" />
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control border-0 p-4" placeholder="Parent mobileno" required="required" />
                                </div>
                                <div class="form-group">
                                    <select class="custom-select border-0 px-4" style="height: 47px;">
                                        <option selected>Select a Class</option>
                                        <option value="10">10th</option>
                                        <option value="11">11th</option>
                                        <option value="12">12th</option>
                                    </select>
                                </div>
                                <div>
                                    <button class="btn btn-dark btn-block border-0 py-3" type="submit">Send Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Registration End -->
	<?php include"footer.php" ?>
</body>

</html>
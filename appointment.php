<?php include 'headermain.php' ?>

<!-- Appointment Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="bg-light rounded">
                    <div class="row g-0">
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                            <div class="h-100 d-flex flex-column justify-content-center p-5">
                                <h1 class="mb-4">Make Appointment</h1>
                                <form method="POST" action="appointmentprocess.php">
                                    <div class="row g-3">
                                        <div class="col-sm-6">
                                            <div class="form-floating">
                                                <input name="gic" type="text" class="form-control border-0" id="cage" placeholder="Guardian IC">
                                                <label for="gic">Guardian IC</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-floating">
                                                <input name="cmykid" type="text" class="form-control border-0" id="cage" placeholder="Child Mykid">
                                                <label for="cage">Child Mykid</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-floating">
                                                <input name="gname" type="text" class="form-control border-0" id="gname" placeholder="Gurdian Name">
                                                <label for="gname">Gurdian Name</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-floating">
                                                <input name="cname" type="text" class="form-control border-0" id="cname" placeholder="Child Name">
                                                <label for="cname">Child Name</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-floating">
                                                <input name="gphone" type="number" class="form-control border-0" id="gmail" placeholder="Gurdian Phone">
                                                <label for="gmail">Gurdian Phone</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-floating">
                                                <input name="appdate" type="datetime-local" class="form-control border-0" id="cage" placeholder="Appointment Date">
                                                <label for="cage">Appointment Date</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100 py-3" type="submit">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" style="min-height: 400px;">
                            <div class="position-relative h-100">
                                <img class="position-absolute w-100 h-100 rounded" src="img/appointment.jpg" style="object-fit: cover;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Appointment End -->

<?php include 'footermain.php' ?>
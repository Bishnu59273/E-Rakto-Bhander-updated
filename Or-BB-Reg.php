<?php require "db/OrgBloodBankReg.php" ?>
<!-- Header Link -->
<?php require "header.php"; ?>
<!--  -->
<link rel="stylesheet" href="assets/css/cs1.css">
<!--  -->
<center>
    <div id="jm1">
        <h1>Organization/Blood Bank Registration</h1>
        <div id="ro1">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <input type="text" class="fname col-sm-5" name="OrgBBname"
                    placeholder="Orgnization Name:*/Blood Bank Name:">

                <select class="fname col-sm-5" name="OrgBBType">
                    <option disabled selected>Orgnization/Blood Bank Type</option>
                    <option value="Govt.">Govt.</option>
                    <option value="Private">Private</option>
                </select>



                <input type="text" class="fname col-sm-5" name="ORgBBEmail" placeholder="Orgnization Email">


                <input type="text" class="fname col-sm-5" name="OrgMNum" placeholder="Orgnization Mobile *">


                <input type="text" class="fname col-sm-5" name="OrgBBAIDName" placeholder="Authoraize Id Proof Name">


                <input type="text" class="fname col-sm-5" name="OrgBBAIDNum" placeholder="ID Number">


                <select class="fname col-sm-5" name="OrgBBDist" required>
                    <option disabled selected>Select District</option>
                    <option value="Alipurduar">Alipurduar</option>
                    <option value="Bankura">Bankura</option>
                    <option value="Birbhum">Birbhum</option>
                    <option value="Cooch Behar">Cooch Behar</option>
                    <option value="Dakshin Dinajpur">Dakshin Dinajpur</option>
                    <option value="Darjeeling">Darjeeling</option>
                    <option value="Hooghly">Hooghly</option>
                    <option value="Howrah">Howrah</option>
                    <option value="Jalpaiguri">Jalpaiguri</option>
                    <option value="Jhargram">Jhargram</option>
                    <option value="Kalimpong">Kalimpong</option>
                    <option value="Kolkata">Kolkata</option>
                    <option value="Maldah">Maldah</option>
                    <option value="Murshidabad">Murshidabad </option>
                    <option value="Nadia">Nadia</option>
                    <option value="North Twenty Four Parganas">North Twenty Four Parganas</option>
                    <option value="Paschim Bardhaman">Paschim Bardhaman</option>
                    <option value="Paschim Medinipur">Paschim Medinipur</option>
                    <option value="Purba Bardhaman">Purba Bardhaman</option>
                    <option value="Purba Medinipur">Purba Medinipur</option>
                    <option value="Purulia">Purulia</option>
                    <option value="South Twenty Four Parganas">South Twenty Four Parganas</option>
                    <option value="Uttar Dinajpur">Uttar Dinajpur</option>
                </select>
                <input type="text" class="fname col-sm-5" name="OrgBBCity" placeholder="Enter City Name">

                <input type="text" class="fname col-sm-5" name="OrgBBFullAdd" placeholder="Enter Full Address">

                <input type="text" class="fname col-sm-5" name="OrgBBHeadName"
                    placeholder="Head Of The Organaigation Name">

                <input type="text" class="fname col-sm-5" name="OrgBBHPName" placeholder="Pozition Name">

                <input type="text" class="fname col-sm-5" name="OrgBBHMNum"
                    placeholder="Head Of The Organaigation Mobile Number">

                <input type="text" class="fname col-sm-5" name="OrgBBHEmail"
                    placeholder="Head Of The Organaigation Email Id">

                <input type="text" class="fname col-sm-5" name="OrgBBNumMember"
                    placeholder="Enter The Number Of Member's">

                <input type="text" class="fname col-sm-5" name="OrgBBUserName" placeholder="Enter User name">
                <div class="col-md-12 orb-psec" style="display: flex;">
                    <input type="text" class="fname col-sm-5" name="OrgBBNPassword" placeholder="Enter New Password">
                    <input type="text" class="fname col-sm-5" name="OrgBBCPassword" placeholder="Confirm Password">
                </div>
                <button id="orb-b1" type="submit" name="OrgReg">SUBMIT</button>

            </form>
        </div>
    </div>
</center>


<!-- Footer Link -->
<?php require "footer.php"; ?>
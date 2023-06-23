<?php
require 'doner-insert.php';
?>
<!-- Header Link -->
<?php require "header.php"; ?>
<!--  -->
<link rel="stylesheet" href="css/DRcs.css">

<div class="u-container">
    <header class="h-tt">
        <h1 class="DrregHead">Donor Registration</h1>
    </header>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="u-form" method="post">
        <!-- <div class="form first"> -->
        <div class="details personal">
            <span class="u-title">
                <h3>Personal Details:-</h3>
            </span>
            <div class="fields">
                <div class="input-field">
                    <input class="U-iff" type="text" name="DFullName" placeholder="Enter your name" required>
                </div>

                <div class="input-field">
                    <input class="U-ifs" type="date" name="DDOB" placeholder="Enter birth date" required>
                </div>

                <div class="input-field">
                    <input class="U-ifs" type="number" name="DAge" placeholder="Enter your age" required>
                </div>

                <div class="input-field">
                    <input class="U-ifs" type="number" name="DMnum" placeholder="Enter mobile number" required>
                </div>

                <div class="input-field">
                    <input class="U-iff" type="email" name="DEmail" placeholder="Enter your email" required>
                </div>

                <div class="input-field">
                    <select class="U-ifs" name="DGender" required>
                        <option disabled selected>Select your gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Others">Others</option>
                    </select>
                </div>

                <div class="input-field">
                    <select class="U-ifs" name="DBGroup" required>
                        <option disabled selected>Select Blood Group</option>
                        <option value="A+">A+</option>
                        <option value="O+">O+</option>
                        <option value="B+">B+</option>
                        <option value="AB+">AB+</option>
                        <option value="A-">A-</option>
                        <option value="O-">O-</option>
                        <option value="B-">B-</option>
                        <option value="AB-">AB-</option>
                        <option value="Oh-">Oh-</option>
                        <option value="Oh+">Oh+</option>
                    </select>
                </div>

                <div class="input-field">
                    <input class="U-iff" type="text" name="DOccup" placeholder="Enter your Occupation" required>
                </div>
            </div>
        </div>



        <div class="details family">
            <span class="u-title">
                <h3>Family Details:-</h3>
            </span>
            <div class="fields">
                <div class="input-field">
                    <input class="U-iff" type="text" name="DFatherName" placeholder="Enter father name" required>
                </div>

                <div class="input-field">
                    <input class="U-iff" type="text" name="DMotherName" placeholder="Enter mother name" required>
                </div>
            </div>

            <div class="details ID">
                <span class="u-title">
                    <h3>Identity Details:-</h3>
                </span>
                <div class="fields">
                    <div class="input-field">
                        <select class="U-ifs" name="DIDtype" required>
                            <option disabled selected>Select id proof</option>
                            <option value="Aadhaar Card">Aadhaar Card</option>
                            <option value="Voter Card">Voter Card</option>
                            <option value="Pan Card">Pan Card</option>
                            <option value="Driving Licence">Driving Licence</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <div class="input-field">
                        <input class="U-iff" type="number" name="DIdNo" placeholder="Enter ID number" required>
                    </div>
                </div>
            </div>

            <div class="details address">
                <span class="u-title">
                    <h3>Address Details:-</h3>
                </span>
                <div class="fields">

                    <div class="input-field">
                        <select class="U-ifs" name="DAddType" required>
                            <option disabled selected>Select address Type</option>
                            <option value="Permanent">Permanent</option>
                            <option value="Temporary">Temporary</option>
                        </select>
                    </div>

                    <div class="input-field">
                        <select class="U-ifs" name="DState" required>
                            <option disabled selected>Select State</option>
                            <option value="Andaman & Nicobar Islands">Andaman & Nicobar Islands</option>
                            <option value="Andhra Pradesh">Andhra Pradesh</option>
                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                            <option value="Assam">Assam</option>
                            <option value="Bihar">Bihar</option>
                            <option value="Chandigarh">Chandigarh</option>
                            <option value="Chhattisgarh">Chhattisgarh</option>
                            <option value="Dadra & Nagar Haveli">Dadra & Nagar Haveli</option>
                            <option value="Daman & Diu">Daman & Diu</option>
                            <option value="Delhi">Delhi</option>
                            <option value="Goa">Goa</option>
                            <option value="Gujarat">Gujarat</option>
                            <option value="Haryana">Haryana</option>
                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                            <option value="Jharkhand">Jharkhand</option>
                            <option value="Karnataka">Karnataka</option>
                            <option value="Kerala">Kerala</option>
                            <option value="Ladakh">Ladakh</option>
                            <option value="Lakshadweep">Lakshadweep</option>
                            <option value="Madhya Pradesh">Madhya Pradesh</option>
                            <option value="Maharashtra">Maharashtra</option>
                            <option value="Manipur">Manipur</option>
                            <option value="Meghalaya">Meghalaya</option>
                            <option value="Mizoram">Mizoram</option>
                            <option value="Nagaland">Nagaland</option>
                            <option value="Odisha">Odisha</option>
                            <option value="Puducherry">Puducherry</option>
                            <option value="Punjab">Punjab</option>
                            <option value="Rajasthan">Rajasthan</option>
                            <option value="Sikkim">Sikkim</option>
                            <option value="Tamil Nadu">Tamil Nadu</option>
                            <option value="Telangana">Telangana</option>
                            <option value="Tripura">Tripura</option>
                            <option value="Uttarakhand">Uttarakhand</option>
                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                            <option value="West Bengal">West Bengal</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>

                    <div class="input-field">
                        <select class="U-ifs" name="DDist" required>
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
                        </select>
                    </div>

                    <div class="input-field">
                        <input class="U-iff" type="text" name="DCity" placeholder="Enter your City" required>
                    </div>

                    <div class="input-field">
                        <select class="U-ifvs" name="DResArea" required>
                            <option disabled selected>Select You Area</option>
                            <option value="Municipality">Municipality</option>
                            <option value="Block">Block</option>
                        </select>
                    </div>

                    <div class="input-field">
                        <input class="U-iff" type="text" name="DFullAdd" placeholder="Enter your full address" rows="3"
                            required>
                    </div>
                    <div class="input-field">

                        <input class="U-ifs" type="number" name="DPinCode" placeholder="Enter your pincode" required>
                    </div>
                </div>
            </div>
        </div>
        <div class=" user details">
            <span class="u-title">
                <h3>User Details:-</h3>
            </span>
            <div class="fields">
                <div class="input-field">

                    <input class="U-iff" type="text" name="DUserName" placeholder="Enter Your user name" required>
                </div>

                <div class="input-field">

                    <input class="U-ifs" type="password" name="DNPass" placeholder="Enter your New password" required>
                </div>

                <div class="input-field">

                    <input class="U-ifs" type="password" name="DCPass" placeholder="Enter your confirm password"
                        required>
                </div>
            </div>
            <center>
                <div class="buttons">
                    <input type="submit" class="qbtn" name="Dregsubmit">
                </div>
            </center>
        </div>
        <!-- </div> -->
    </form>
</div>


<!-- Footer Link -->
<?php require "footer.php"; ?>
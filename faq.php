<?php require "header.php";?>
<div class="eb-container">

    <h1 class="eb-heading">Frequently Asked Questions</h1>
    <div class="accordion-container">

        <div class="accordion active">
            <div class="accordion-heading">
                <h3>Who can donate blood?</h3>
                <i class="fas fa-angle-down"></i>
            </div>
            <p class="accordion-content">
                Generally, individuals who are in good health and meet the eligibility criteria can donate blood.
                However, specific guidelines may vary based on the blood donation organization or center.
            </p>
        </div>

        <div class="accordion">
            <div class="accordion-heading">
                <h3>What are the general requirements to be eligible for blood donation?</h3>
                <i class="fas fa-angle-down"></i>
            </div>
            <p class="accordion-content">
                The general requirements for blood donation typically include being in good health, being above a
                certain age (usually 18 or 16 with parental consent), meeting the minimum weight requirement (usually
                around 110 pounds or 50 kilograms), and not having
                any infectious diseases.
            </p>
        </div>

        <div class="accordion">
            <div class="accordion-heading">
                <h3>How long does the blood donation process take?</h3>
                <i class="fas fa-angle-down"></i>
            </div>
            <p class="accordion-content">
                The blood donation process usually takes around 10 to 15 minutes for the actual blood collection.
                However, the overall time may vary due to registration, health screening, and recovery after donation.
            </p>
        </div>

        <div class="accordion">
            <div class="accordion-heading">
                <h3>Does donating blood hurt?</h3>
                <i class="fas fa-angle-down"></i>
            </div>
            <p class="accordion-content">
                The donation process typically involves a small pinch or prick when the needle is inserted, which may
                cause temporary discomfort. However, the actual donation is generally painless. The staff will ensure
                your comfort throughout the process.
            </p>
        </div>

        <div class="accordion">
            <div class="accordion-heading">
                <h3>What happens during the blood donation process?</h3>
                <i class="fas fa-angle-down"></i>
            </div>
            <p class="accordion-content">
                During the blood donation process, you will be asked to complete a registration form and undergo a brief
                health screening. This includes checking your blood pressure, pulse, and hemoglobin levels. If eligible,
                the actual blood collection will take place,
                usually by inserting a needle into a vein in your arm.
            </p>
        </div>

        <div class="accordion">
            <div class="accordion-heading">
                <h3>How is the donated blood used?</h3>
                <i class="fas fa-angle-down"></i>
            </div>
            <p class="accordion-content">
                Donated blood is used for various medical purposes, including transfusions for patients undergoing
                surgeries, individuals with medical conditions that require blood transfusions, and those who have
                experienced significant blood loss due to accidents or
                injuries.
            </p>
        </div>

        <div class="accordion">
            <div class="accordion-heading">
                <h3>Is there an age limit for blood donation?</h3>
                <i class="fas fa-angle-down"></i>
            </div>
            <p class="accordion-content">
                Yes, there is usually an age limit for blood donation. Most organizations require donors to be at least
                18 years old, although some allow individuals who are 16 years old with parental consent.
            </p>
        </div>




        <div class="accordion">
            <div class="accordion-heading">
                <h3>What are the requirements to be eligible for blood donation?</h3>
                <i class="fas fa-angle-down"></i>
            </div>
            <p class="accordion-content">
                The requirements for blood donation typically include being in good health, meeting age and weight
                criteria, having a valid identification, and not engaging in high-risk behaviors such as intravenous
                drug use or unprotected sex. The specific eligibility
                criteria may vary between blood donation centers and countries. During the screening process, potential
                donors are asked a series of questions to ensure their eligibility and the safety of the donated blood.
            </p>
        </div>

        <div class="accordion">
            <div class="accordion-heading">
                <h3>How often can I donate blood?</h3>
                <i class="fas fa-angle-down"></i>
            </div>
            <p class="accordion-content">
                Blood donation frequency varies, but in most countries, individuals can donate whole blood every 8 to 12
                weeks, depending on factors such as the donor's health and the blood center's policies. This timeframe
                allows sufficient time for the donor's body
                to replenish the donated blood components. Some types of donations, such as platelet or plasma
                donations, may have different donation frequency guidelines.

            </p>
        </div>

        <div class="accordion">
            <div class="accordion-heading">
                <h3>What are the benefits of donating blood?</h3>
                <i class="fas fa-angle-down"></i>
            </div>
            <p class="accordion-content">

                Donating blood not only helps save lives but also offers health benefits to the donor. Regular blood
                donation may help reduce the risk of certain health conditions such as heart disease, as it stimulates
                the production of fresh, new blood cells. Additionally,
                the screening process before donation provides an opportunity for a free health check-up, including
                tests for blood pressure, hemoglobin levels, and infectious diseases.

            </p>
        </div>

        <div class="accordion">
            <div class="accordion-heading">
                <h3>How long does the blood donation process take?</h3>
                <i class="fas fa-angle-down"></i>
            </div>
            <p class="accordion-content">
                The blood donation process usually takes about 30 minutes to an hour. This includes the registration
                process, a pre-donation health screening questionnaire, a mini-physical examination to check vital
                signs, the actual blood donation process, and a short
                resting period after donation. The duration may vary slightly depending on factors such as the
                efficiency of the blood donation center and the donor's individual circumstances.

            </p>
        </div>
    </div>
</div>

<!-- main body end -->

<!-- Faq script -->
<script>
let accordions = document.querySelectorAll('.accordion-container .accordion');

accordions.forEach(acco => {
    acco.onclick = () => {
        accordions.forEach(subAcco => {
            subAcco.classList.remove('active')
        });
        acco.classList.add('active');
    }
})
</script>
<!-- Footer Link -->
<?php require "footer.php";?>
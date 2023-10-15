<?php
/**
 * Template name: Wholesale
 */
get_header();
?>

<div class="wholesale-page">
    <section>
        <div class="container">
            <p class="title title_3">Wholesale</p>
        </div>
        <div class="container wholesale-wrapper">
            <div class="wholesale_form">
                <form class="regular">
                    <fieldset>
                        <p class="row row-full">
                            <label>Your Name *</label>
                            <input type="text" name="" placeholder="Enter Name Here">
                        </p>
                    </fieldset>
                    <fieldset>
                        <p class="row row-full">
                            <label>Business Name *</label>
                            <input type="text" name="" placeholder="Enter Bussines Name Here">
                        </p>
                    </fieldset>
                    <fieldset>
                        <p class="row row-full">
                            <label>Email Address *</label>
                            <input type="text" name="" placeholder="yourmail@mail.com">
                        </p>
                    </fieldset>
                    <fieldset>
                        <p class="row row-full">
                            <label>Phone</label>
                            <input type="tel" name="" placeholder="___-___-____">
                        </p>
                    </fieldset>
                    <fieldset>
                        <p class="row row-full">
                            <label>Business Address *</label>
                            <input type="text" name="" placeholder="City, Street Name">
                        </p>
                    </fieldset>
                    <fieldset>
                        <p class="row row-full row-select">
                            <label>Type of Business</label>
                            <select>
                                <option value="1" data-display="Open List">Open List</option>
                                <option value="1">Open List 3333</option>
                                <option value="1">Open List 5555555</option>
                            </select>
                        </p>
                    </fieldset>
                    <fieldset>
                        <p class="row row-select">
                            <label>Country / Region *</label>
                            <select>
                                <option value="1" data-display="Open List"> Choose Country / Region </option>
                                <option value="1">Open List 3333</option>
                                <option value="1">Open List 5555555</option>
                            </select>
                        </p>
                        <p class="row row-select">
                            <label>State *</label>
                            <select>
                                <option value="1" data-display="Open List">  Choose State</option>
                                <option value="1">Open List 3333</option>
                                <option value="1">Open List 5555555</option>
                            </select>
                        </p>
                    </fieldset>
                    <fieldset>
                        <p class="row">
                            <label>City *</label>
                            <input type="text" name="" placeholder="Enter Your City">
                        </p>
                        <p class="row">
                            <label>Zipcode *</label>
                            <input type="text" name="" placeholder="_____">
                        </p>
                    </fieldset>
                    <p class="row row-full">
                        <label>Commentary</label>
                        <textarea placeholder="Write your message..."></textarea>
                    </p>
                    <button type="submit" class="btn-primary lg dark">Send</button>
                </form>
            </div>
            <div class="wholesale_info">
                <p class="title title_2">Business Opportunity</p>
                <div class="editor">
                    <p>We are always looking for great relationships with great resellers and dealers. If you are interested in becoming a reseller, please fill out the form below.</p>

                    <p>Bulk discounts are available for business buyers. Please contact us or call our sales department for bulk pricing for orders of 10+ items.
                        Phone (United States): (215) 827-4529. Same day shipping is available from Cherry Hill, NJ distribution center.</p>

                    <p>Rome Tech prides itself on providing excellent service, consistent growth and building strong, mutually beneficial customer relationships.</p>
                </div>
                <img src="assets/images/stressed-businesswoman-checking-profit-resultes-standing-business-office 1.jpg" alt="#" title>
            </div>
        </div>
    </section>

</div>

<?php
get_footer();
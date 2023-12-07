<?php
$setting = \App\Models\Setting::pluck('value', 'name')->toArray();
$auth_logo = isset($setting['auth_logo']) ? 'uploads/' . $setting['auth_logo'] : 'assets/media/logos/logo-light.png';
$auth_page_heading = isset($setting['auth_page_heading']) ? $setting['auth_page_heading'] : 'wwww.webexert.com';
$auth_image = isset($setting['auth_image']) ? 'uploads/' . $setting['auth_image'] : 'assets/media/svg/illustrations/login-visual-1.svg';
$agent_fixed_price = isset($setting['agent_fixed_price']) ? $setting['agent_fixed_price'] : '20.00';
$company_fixed_price = isset($setting['company_fixed_price']) ? $setting['company_fixed_price'] : '135.00';

$copy_right = isset($setting['copy_right']) ? $setting['copy_right'] : 'wwww.webexert.com';
$stripe_client = isset($setting['stripe_client']) ? $setting['stripe_client'] : 'pk_test_0EgBbBMGnb4kCquzWTPh6dKC00glHV9dZS';
?>
<?php $__env->startSection('meta'); ?>
    <title>Place a Registered Agent Service Order - WY Commercial Registered Agent LLC</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="regAgent">
        <div class="container">
            <div class="top">
                <h1 class="mainHeading"><span> Wyoming</span> Registered Agent</h1>
                <div class="tabs nav_tabs nav_tabs_steps">

                    <ul class="nav">
                        <li class="nav-item">
                            <button class="nav-link active" id="order-tab" data-bs-toggle="tab"
                                data-bs-target="#order-tab-pane" type="button">Order</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="company-tab" data-bs-toggle="tab"
                                data-bs-target="#company-tab-pane" type="button">Company</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="management-tab" data-bs-toggle="tab"
                                data-bs-target="#management-tab-pane" type="button">Management</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                                data-bs-target="#contact-tab-pane" type="button">Contact</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="optional-items-tab" data-bs-toggle="tab"
                                data-bs-target="#optional-items-tab-pane" type="button">Optional
                                Items</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="payment-tab" data-bs-toggle="tab"
                                data-bs-target="#payment-tab-pane" type="button">Payment</button>
                        </li>
                    </ul>

                </div>
            </div>
            <div class="main">
                <div class="left">
                    <div class="order Panel active" id="order-tab-pane">

                        <h2>Order Information</h2>
                        <p><img src="<?php echo e(asset('frontend/images/cloudgreen.png')); ?>" alt="">1 Year Registered Agent
                        </p>
                        <p><img src="<?php echo e(asset('frontend/images/cloudgreen.png')); ?>" alt="">Order Filled In 24 Hours
                        </p>
                        <p><img src="<?php echo e(asset('frontend/images/cloudgreen.png')); ?>" alt="">Wyoming Address Use</p>
                        <p><img src="<?php echo e(asset('frontend/images/cloudgreen.png')); ?>" alt="">Mail Forwarding (scan)
                        </p>
                        <p><img src="<?php echo e(asset('frontend/images/cloudgreen.png')); ?>" alt="">No Identification
                            Required</p>
                        <p><img src="<?php echo e(asset('frontend/images/cloudgreen.png')); ?>" alt="">International Clients
                            Welcome</p>
                    </div>

                    <form role="form" action="<?php echo e(route('stripe.post')); ?>" method="post"
                        class="require-validation col-md-12" data-cc-on-file="false"
                        data-stripe-publishable-key="<?php echo e($stripe_client); ?>" id="payment-form">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" value="1" name="agent">

                        <div class="company Panel" id="company-tab-pane">
                            <h2>Company Information</h2>
                            <div class="input">
                                <label for="">Company Name</label>
                                <input type="text" type="text" name="company_name" id="company_name"
                                    placeholder="Your Company Name">
                            </div>
                            <div class="input">
                                <label for="">Company Entity Type</label>
                                <select class="form-select entity_select entity-type-select" name="entity_type"
                                    id="entity_type"
                                    onchange="if($(this).val() == 'Corp'){$('div[id^=group_type_]').hide();$('#group_type_Corp').show()}else if($(this).val() == 'NP_Corp'){$('div[id^=group_type_]').hide();$('#group_type_NP_Corp').show()}else{$('.group_type_entity').show();$('#group_type_NP_Corp').hide();$('#group_type_Corp').hide();}">>
                                    <option value="LLC">LLC</option>
                                    <option value="Corp">Corporation</option>
                                    <option value="NP_Corp">Non-profit corporation</option>
                                    <option value="Agent NP LLC">Non-profit LLC</option>
                                    <option value="Agent PLLC">Professional LLC</option>
                                    <option value="Agent PC">Professional Corp</option>
                                    <option value="Agent LP">Limited Partnership</option>
                                    <option value="Agent LLP">LLP</option>
                                    <option value="Agent GP">General Partnership</option>
                                    <option value="Agent Sole Proprietorship">Sole Proprietorship</option>
                                    <option value="Agent Trust">Trust</option>
                                    <option value="Agent Individual">Individual</option>
                                    <option value="Agent Attorney for Bar">Attorney for Bar</option>
                                </select>
                            </div>

                        </div>




                        <div class="management Panel" id="management-tab-pane">
                            <h2>Company Management</h2>


                            <div class="inputCheck">
                                <div class="parent">

                                    <div class="inputdiv active" onclick="SelectService(this, 'member-manage')">

                                        <input type="checkbox" checked class="management_type" name="management_type"
                                            id="management-type-member_managed" value="Member_Managed">
                                        Member Managed
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path
                                            d="M11.95 18C12.3 18 12.596 17.879 12.838 17.637C13.08 17.395 13.2007 17.0993 13.2 16.75C13.2 16.4 13.0793 16.104 12.838 15.862C12.5967 15.62 12.3007 15.4993 11.95 15.5C11.6 15.5 11.3043 15.621 11.063 15.863C10.8217 16.105 10.7007 16.4007 10.7 16.75C10.7 17.1 10.821 17.396 11.063 17.638C11.305 17.88 11.6007 18.0007 11.95 18ZM11.05 14.15H12.9C12.9 13.6 12.9627 13.1667 13.088 12.85C13.2133 12.5333 13.5673 12.1 14.15 11.55C14.5833 11.1167 14.925 10.704 15.175 10.312C15.425 9.92 15.55 9.44933 15.55 8.9C15.55 7.96667 15.2083 7.25 14.525 6.75C13.8417 6.25 13.0333 6 12.1 6C11.15 6 10.379 6.25 9.787 6.75C9.195 7.25 8.78267 7.85 8.55 8.55L10.2 9.2C10.2833 8.9 10.471 8.575 10.763 8.225C11.055 7.875 11.5007 7.7 12.1 7.7C12.6333 7.7 13.0333 7.846 13.3 8.138C13.5667 8.43 13.7 8.75067 13.7 9.1C13.7 9.43333 13.6 9.746 13.4 10.038C13.2 10.33 12.95 10.6007 12.65 10.85C11.9167 11.5 11.4667 11.9917 11.3 12.325C11.1333 12.6583 11.05 13.2667 11.05 14.15ZM12 22C10.6167 22 9.31667 21.7373 8.1 21.212C6.88333 20.6867 5.825 19.9743 4.925 19.075C4.025 18.175 3.31267 17.1167 2.788 15.9C2.26333 14.6833 2.00067 13.3833 2 12C2 10.6167 2.26267 9.31667 2.788 8.1C3.31333 6.88333 4.02567 5.825 4.925 4.925C5.825 4.025 6.88333 3.31267 8.1 2.788C9.31667 2.26333 10.6167 2.00067 12 2C13.3833 2 14.6833 2.26267 15.9 2.788C17.1167 3.31333 18.175 4.02567 19.075 4.925C19.975 5.825 20.6877 6.88333 21.213 8.1C21.7383 9.31667 22.0007 10.6167 22 12C22 13.3833 21.7373 14.6833 21.212 15.9C20.6867 17.1167 19.9743 18.175 19.075 19.075C18.175 19.975 17.1167 20.6877 15.9 21.213C14.6833 21.7383 13.3833 22.0007 12 22Z"
                                            fill="#CCCCCC" />
                                    </svg>
                                </div>
                                <div class="parent">

                                    <div class="inputdiv" onclick="SelectService(this, 'manager-mangar')">

                                        <input type="checkbox" class="management_type" name="management_type"
                                            id="management-type-manager_managed" value="Manager_Managed">
                                        Manager Managed
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path
                                            d="M11.95 18C12.3 18 12.596 17.879 12.838 17.637C13.08 17.395 13.2007 17.0993 13.2 16.75C13.2 16.4 13.0793 16.104 12.838 15.862C12.5967 15.62 12.3007 15.4993 11.95 15.5C11.6 15.5 11.3043 15.621 11.063 15.863C10.8217 16.105 10.7007 16.4007 10.7 16.75C10.7 17.1 10.821 17.396 11.063 17.638C11.305 17.88 11.6007 18.0007 11.95 18ZM11.05 14.15H12.9C12.9 13.6 12.9627 13.1667 13.088 12.85C13.2133 12.5333 13.5673 12.1 14.15 11.55C14.5833 11.1167 14.925 10.704 15.175 10.312C15.425 9.92 15.55 9.44933 15.55 8.9C15.55 7.96667 15.2083 7.25 14.525 6.75C13.8417 6.25 13.0333 6 12.1 6C11.15 6 10.379 6.25 9.787 6.75C9.195 7.25 8.78267 7.85 8.55 8.55L10.2 9.2C10.2833 8.9 10.471 8.575 10.763 8.225C11.055 7.875 11.5007 7.7 12.1 7.7C12.6333 7.7 13.0333 7.846 13.3 8.138C13.5667 8.43 13.7 8.75067 13.7 9.1C13.7 9.43333 13.6 9.746 13.4 10.038C13.2 10.33 12.95 10.6007 12.65 10.85C11.9167 11.5 11.4667 11.9917 11.3 12.325C11.1333 12.6583 11.05 13.2667 11.05 14.15ZM12 22C10.6167 22 9.31667 21.7373 8.1 21.212C6.88333 20.6867 5.825 19.9743 4.925 19.075C4.025 18.175 3.31267 17.1167 2.788 15.9C2.26333 14.6833 2.00067 13.3833 2 12C2 10.6167 2.26267 9.31667 2.788 8.1C3.31333 6.88333 4.02567 5.825 4.925 4.925C5.825 4.025 6.88333 3.31267 8.1 2.788C9.31667 2.26333 10.6167 2.00067 12 2C13.3833 2 14.6833 2.26267 15.9 2.788C17.1167 3.31333 18.175 4.02567 19.075 4.925C19.975 5.825 20.6877 6.88333 21.213 8.1C21.7383 9.31667 22.0007 10.6167 22 12C22 13.3833 21.7373 14.6833 21.212 15.9C20.6867 17.1167 19.9743 18.175 19.075 19.075C18.175 19.975 17.1167 20.6877 15.9 21.213C14.6833 21.7383 13.3833 22.0007 12 22Z"
                                            fill="#CCCCCC" />
                                    </svg>
                                </div>
                            </div>

                            <div class="members input">
                                <label for="">How Many Members Will Be In This Company?</label>
                                <div class="inputValue">

                                    <label for="" id="member">Members</label>
                                    <label for="" id="manager" style="display: none;">Manager</label>
                                    <div class="btns">
                                        <button onclick="Member(event, 'subt')">-</button>
                                        <p class="membervalue">1</p>
                                        <button onclick="Member(event, 'add')">+</button>
                                    </div>
                                </div>
                            </div>

                            <div id="add_inputs">
                                <div class="inputs">
                                    <div class="input">
                                        <label for="">First Name</label>
                                        <input type="text" name="member[0][first_name]" placeholder="Your First Name">
                                    </div>
                                    <div class="input">
                                        <label for="">Last Name</label>
                                        <input type="text" name="member[0][last_name]" placeholder="Your Last Name">
                                    </div>
                                </div>

                                <div class="input">
                                    <label for="">Address To Record With The State</label>
                                    <select name="member[0][address_selector]" id="member[0][address_selector]"
                                        onchange="Address(this)">
                                        <option value="default">Our registered agent address</option>
                                        <option value="specific">Specify Address</option>
                                    </select>
                                    <input type="text" hidden class="address" name="member[0][address]" placeholder="Your Address here..."
                                        style="border-radius: 0 0 .4rem .4rem;">
                                </div>
                            </div>

                            <div id="new_inputs">

                            </div>

                        </div>







                        <div class="contact Panel " id="contact-tab-pane">
                            <h2>Contact Detail</h2>


                            <div class="inputs">
                                <div class="input">
                                    <label for="">First Name</label>
                                    <input type="text" name="first_name" id="first_name"
                                        placeholder="Your First Name">
                                </div>
                                <div class="input">
                                    <label for="">Last Name</label>
                                    <input type="text" name="last_name" id="last_name" placeholder="Your Last Name">
                                </div>
                            </div>
                            <div class="input">
                                <label for="">Country</label>
                                <select class="form-select verifiable_address_field"id="mailing_address_address_country"
                                    name="mailing_address[address_country]">
                                    <option value="AF">Afghanistan</option>
                                    <option value="AX">Åland</option>
                                    <option value="AL">Albania</option>
                                    <option value="DZ">Algeria</option>
                                    <option value="AS">American Samoa</option>
                                    <option value="AD">Andorra</option>
                                    <option value="AO">Angola</option>
                                    <option value="AI">Anguilla</option>
                                    <option value="AQ">Antarctica</option>
                                    <option value="AG">Antigua and Barbuda</option>
                                    <option value="AR">Argentina</option>
                                    <option value="AM">Armenia</option>
                                    <option value="AW">Aruba</option>
                                    <option value="AU">Australia</option>
                                    <option value="AT">Austria</option>
                                    <option value="AZ">Azerbaijan</option>
                                    <option value="BS">Bahamas</option>
                                    <option value="BH">Bahrain</option>
                                    <option value="BD">Bangladesh</option>
                                    <option value="BB">Barbados</option>
                                    <option value="BY">Belarus</option>
                                    <option value="BE">Belgium</option>
                                    <option value="BZ">Belize</option>
                                    <option value="BJ">Benin</option>
                                    <option value="BM">Bermuda</option>
                                    <option value="BT">Bhutan</option>
                                    <option value="BO">Bolivia</option>
                                    <option value="BQ">Bonaire</option>
                                    <option value="BA">Bosnia and Herzegovina</option>
                                    <option value="BW">Botswana</option>
                                    <option value="BV">Bouvet Island</option>
                                    <option value="BR">Brazil</option>
                                    <option value="IO">British Indian Ocean Territory</option>
                                    <option value="VG">British Virgin Islands</option>
                                    <option value="BN">Brunei</option>
                                    <option value="BG">Bulgaria</option>
                                    <option value="BF">Burkina Faso</option>
                                    <option value="BI">Burundi</option>
                                    <option value="KH">Cambodia</option>
                                    <option value="CM">Cameroon</option>
                                    <option value="CA">Canada</option>
                                    <option value="CV">Cape Verde</option>
                                    <option value="KY">Cayman Islands</option>
                                    <option value="CF">Central African Republic</option>
                                    <option value="TD">Chad</option>
                                    <option value="CL">Chile</option>
                                    <option value="CN">China</option>
                                    <option value="CX">Christmas Island</option>
                                    <option value="CC">Cocos [Keeling] Islands</option>
                                    <option value="CO">Colombia</option>
                                    <option value="KM">Comoros</option>
                                    <option value="CK">Cook Islands</option>
                                    <option value="CR">Costa Rica</option>
                                    <option value="HR">Croatia</option>
                                    <option value="CU">Cuba</option>
                                    <option value="CW">Curacao</option>
                                    <option value="CY">Cyprus</option>
                                    <option value="CZ">Czech Republic</option>
                                    <option value="CD">Democratic Republic of the Congo
                                    </option>
                                    <option value="DK">Denmark</option>
                                    <option value="DJ">Djibouti</option>
                                    <option value="DM">Dominica</option>
                                    <option value="DO">Dominican Republic</option>
                                    <option value="TL">East Timor</option>
                                    <option value="EC">Ecuador</option>
                                    <option value="EG">Egypt</option>
                                    <option value="SV">El Salvador</option>
                                    <option value="GQ">Equatorial Guinea</option>
                                    <option value="ER">Eritrea</option>
                                    <option value="EE">Estonia</option>
                                    <option value="ET">Ethiopia</option>
                                    <option value="FK">Falkland Islands</option>
                                    <option value="FO">Faroe Islands</option>
                                    <option value="FJ">Fiji</option>
                                    <option value="FI">Finland</option>
                                    <option value="FR">France</option>
                                    <option value="GF">French Guiana</option>
                                    <option value="PF">French Polynesia</option>
                                    <option value="TF">French Southern Territories</option>
                                    <option value="GA">Gabon</option>
                                    <option value="GM">Gambia</option>
                                    <option value="GE">Georgia</option>
                                    <option value="DE">Germany</option>
                                    <option value="GH">Ghana</option>
                                    <option value="GI">Gibraltar</option>
                                    <option value="GR">Greece</option>
                                    <option value="GL">Greenland</option>
                                    <option value="GD">Grenada</option>
                                    <option value="GP">Guadeloupe</option>
                                    <option value="GU">Guam</option>
                                    <option value="GT">Guatemala</option>
                                    <option value="GG">Guernsey</option>
                                    <option value="GN">Guinea</option>
                                    <option value="GW">Guinea-Bissau</option>
                                    <option value="GY">Guyana</option>
                                    <option value="HT">Haiti</option>
                                    <option value="HM">Heard Island and McDonald Islands
                                    </option>
                                    <option value="HN">Honduras</option>
                                    <option value="HK">Hong Kong</option>
                                    <option value="HU">Hungary</option>
                                    <option value="IS">Iceland</option>
                                    <option value="IN">India</option>
                                    <option value="ID">Indonesia</option>
                                    <option value="IR">Iran</option>
                                    <option value="IQ">Iraq</option>
                                    <option value="IE">Ireland</option>
                                    <option value="IM">Isle of Man</option>
                                    <option value="IL">Israel</option>
                                    <option value="IT">Italy</option>
                                    <option value="CI">Ivory Coast</option>
                                    <option value="JM">Jamaica</option>
                                    <option value="JP">Japan</option>
                                    <option value="JE">Jersey</option>
                                    <option value="JO">Jordan</option>
                                    <option value="KZ">Kazakhstan</option>
                                    <option value="KE">Kenya</option>
                                    <option value="KI">Kiribati</option>
                                    <option value="XK">Kosovo</option>
                                    <option value="KW">Kuwait</option>
                                    <option value="KG">Kyrgyzstan</option>
                                    <option value="LA">Laos</option>
                                    <option value="LV">Latvia</option>
                                    <option value="LB">Lebanon</option>
                                    <option value="LS">Lesotho</option>
                                    <option value="LR">Liberia</option>
                                    <option value="LY">Libya</option>
                                    <option value="LI">Liechtenstein</option>
                                    <option value="LT">Lithuania</option>
                                    <option value="LU">Luxembourg</option>
                                    <option value="MO">Macao</option>
                                    <option value="MK">Macedonia</option>
                                    <option value="MG">Madagascar</option>
                                    <option value="MW">Malawi</option>
                                    <option value="MY">Malaysia</option>
                                    <option value="MV">Maldives</option>
                                    <option value="ML">Mali</option>
                                    <option value="MT">Malta</option>
                                    <option value="MH">Marshall Islands</option>
                                    <option value="MQ">Martinique</option>
                                    <option value="MR">Mauritania</option>
                                    <option value="MU">Mauritius</option>
                                    <option value="YT">Mayotte</option>
                                    <option value="MX">Mexico</option>
                                    <option value="FM">Micronesia</option>
                                    <option value="MD">Moldova</option>
                                    <option value="MC">Monaco</option>
                                    <option value="MN">Mongolia</option>
                                    <option value="ME">Montenegro</option>
                                    <option value="MS">Montserrat</option>
                                    <option value="MA">Morocco</option>
                                    <option value="MZ">Mozambique</option>
                                    <option value="MM">Myanmar [Burma]</option>
                                    <option value="NA">Namibia</option>
                                    <option value="NR">Nauru</option>
                                    <option value="NP">Nepal</option>
                                    <option value="NL">Netherlands</option>
                                    <option value="NC">New Caledonia</option>
                                    <option value="NZ">New Zealand</option>
                                    <option value="NI">Nicaragua</option>
                                    <option value="NE">Niger</option>
                                    <option value="NG">Nigeria</option>
                                    <option value="NU">Niue</option>
                                    <option value="NF">Norfolk Island</option>
                                    <option value="KP">North Korea</option>
                                    <option value="MP">Northern Mariana Islands</option>
                                    <option value="NO">Norway</option>
                                    <option value="OM">Oman</option>
                                    <option value="PK">Pakistan</option>
                                    <option value="PW">Palau</option>
                                    <option value="PS">Palestine</option>
                                    <option value="PA">Panama</option>
                                    <option value="PG">Papua New Guinea</option>
                                    <option value="PY">Paraguay</option>
                                    <option value="PE">Peru</option>
                                    <option value="PH">Philippines</option>
                                    <option value="PN">Pitcairn Islands</option>
                                    <option value="PL">Poland</option>
                                    <option value="PT">Portugal</option>
                                    <option value="PR">Puerto Rico</option>
                                    <option value="QA">Qatar</option>
                                    <option value="CG">Republic of the Congo</option>
                                    <option value="RE">Réunion</option>
                                    <option value="RO">Romania</option>
                                    <option value="RU">Russia</option>
                                    <option value="RW">Rwanda</option>
                                    <option value="BL">Saint Barthélemy</option>
                                    <option value="SH">Saint Helena</option>
                                    <option value="KN">Saint Kitts and Nevis</option>
                                    <option value="LC">Saint Lucia</option>
                                    <option value="MF">Saint Martin</option>
                                    <option value="PM">Saint Pierre and Miquelon</option>
                                    <option value="VC">Saint Vincent and the Grenadines
                                    </option>
                                    <option value="WS">Samoa</option>
                                    <option value="SM">San Marino</option>
                                    <option value="ST">São Tomé and Príncipe</option>
                                    <option value="SA">Saudi Arabia</option>
                                    <option value="SN">Senegal</option>
                                    <option value="RS">Serbia</option>
                                    <option value="SC">Seychelles</option>
                                    <option value="SL">Sierra Leone</option>
                                    <option value="SG">Singapore</option>
                                    <option value="SX">Sint Maarten</option>
                                    <option value="SK">Slovakia</option>
                                    <option value="SI">Slovenia</option>
                                    <option value="SB">Solomon Islands</option>
                                    <option value="SO">Somalia</option>
                                    <option value="ZA">South Africa</option>
                                    <option value="GS">South Georgia and the South Sandwich
                                        Islands</option>
                                    <option value="KR">South Korea</option>
                                    <option value="SS">South Sudan</option>
                                    <option value="ES">Spain</option>
                                    <option value="LK">Sri Lanka</option>
                                    <option value="SD">Sudan</option>
                                    <option value="SR">Suriname</option>
                                    <option value="SJ">Svalbard and Jan Mayen</option>
                                    <option value="SZ">Swaziland</option>
                                    <option value="SE">Sweden</option>
                                    <option value="CH">Switzerland</option>
                                    <option value="SY">Syria</option>
                                    <option value="TW">Taiwan</option>
                                    <option value="TJ">Tajikistan</option>
                                    <option value="TZ">Tanzania</option>
                                    <option value="TH">Thailand</option>
                                    <option value="TG">Togo</option>
                                    <option value="TK">Tokelau</option>
                                    <option value="TO">Tonga</option>
                                    <option value="TT">Trinidad and Tobago</option>
                                    <option value="TN">Tunisia</option>
                                    <option value="TR">Turkey</option>
                                    <option value="TM">Turkmenistan</option>
                                    <option value="TC">Turks and Caicos Islands</option>
                                    <option value="TV">Tuvalu</option>
                                    <option value="UM">U.S. Minor Outlying Islands</option>
                                    <option value="VI">U.S. Virgin Islands</option>
                                    <option value="UG">Uganda</option>
                                    <option value="UA">Ukraine</option>
                                    <option value="AE">United Arab Emirates</option>
                                    <option value="GB">United Kingdom</option>
                                    <option selected="" value="US">United States</option>
                                    <option value="UY">Uruguay</option>
                                    <option value="UZ">Uzbekistan</option>
                                    <option value="VU">Vanuatu</option>
                                    <option value="VA">Vatican City</option>
                                    <option value="VE">Venezuela</option>
                                    <option value="VN">Vietnam</option>
                                    <option value="WF">Wallis and Futuna</option>
                                    <option value="EH">Western Sahara</option>
                                    <option value="YE">Yemen</option>
                                    <option value="ZM">Zambia</option>
                                    <option value="ZW">Zimbabwe</option>
                                </select>
                            </div>
                            <div class="inputs">
                                <div class="input">
                                    <label for="">Phone</label>
                                    <input type="tel" name="phone_number" id="phone_number"
                                        placeholder="Your Phone Number">
                                </div>
                                <div class="input">
                                    <label for="">Email</label>
                                    <input type="email" name="email" placeholder="Your Email">
                                </div>
                            </div>

                            <div class="input">
                                <label for="">Address</label>
                                <input type="text" type="text" name="mailing_address[address_line1]"
                                    id="mailing_address_address_line1" placeholder="Your Address">
                            </div>
                            <div class="threeInputs">
                                <div class="input">
                                    <label for="">Zip Code</label>
                                    <input type="text" type="text" name="mailing_address[address_code]"
                                        id="mailing_zip_code" placeholder="Your Zip Code">
                                </div>
                                <div class="input">
                                    <label for="">City</label>
                                    <input type="text" type="text" name="mailing_address[city]"
                                        id="mailing_address_city" placeholder="Your City">
                                </div>
                                <div class="input">
                                    <label for="">State</label>
                                    <select class="form-select usa-data" id="mailing_address_address_state"
                                        name="mailing_address[state_province]">
                                        <option selected="" disabled="" value="">Select
                                            state</option>
                                        <option value="AK">AK - Alaska</option>
                                        <option value="AL">AL - Alabama</option>
                                        <option value="AR">AR - Arkansas</option>
                                        <option value="AZ">AZ - Arizona</option>
                                        <option value="CA">CA - California</option>
                                        <option value="CO">CO - Colorado</option>
                                        <option value="CT">CT - Connecticut</option>
                                        <option value="DC">DC - District of Columbia</option>
                                        <option value="DE">DE - Delaware</option>
                                        <option value="FL">FL - Florida</option>
                                        <option value="GA">GA - Georgia</option>
                                        <option value="HI">HI - Hawaii</option>
                                        <option value="IA">IA - Iowa</option>
                                        <option value="ID">ID - Idaho</option>
                                        <option value="IL">IL - Illinois</option>
                                        <option value="IN">IN - Indiana</option>
                                        <option value="KS">KS - Kansas</option>
                                        <option value="KY">KY - Kentucky</option>
                                        <option value="LA">LA - Louisiana</option>
                                        <option value="MA">MA - Massachusetts</option>
                                        <option value="MD">MD - Maryland</option>
                                        <option value="ME">ME - Maine</option>
                                        <option value="MI">MI - Michigan</option>
                                        <option value="MN">MN - Minnesota</option>
                                        <option value="MO">MO - Missouri</option>
                                        <option value="MS">MS - Mississippi</option>
                                        <option value="MT">MT - Montana</option>
                                        <option value="NC">NC - North Carolina</option>
                                        <option value="ND">ND - North Dakota</option>
                                        <option value="NE">NE - Nebraska</option>
                                        <option value="NH">NH - New Hampshire</option>
                                        <option value="NJ">NJ - New Jersey</option>
                                        <option value="NM">NM - New Mexico</option>
                                        <option value="NV">NV - Nevada</option>
                                        <option value="NY">NY - New York</option>
                                        <option value="OH">OH - Ohio</option>
                                        <option value="OK">OK - Oklahoma</option>
                                        <option value="OR">OR - Oregon</option>
                                        <option value="PA">PA - Pennsylvania</option>
                                        <option value="RI">RI - Rhode Island</option>
                                        <option value="SC">SC - South Carolina</option>
                                        <option value="SD">SD - South Dakota</option>
                                        <option value="TN">TN - Tennessee</option>
                                        <option value="TX">TX - Texas</option>
                                        <option value="UT">UT - Utah</option>
                                        <option value="VA">VA - Virginia</option>
                                        <option value="VT">VT - Vermont</option>
                                        <option value="WA">WA - Washington</option>
                                        <option value="WI">WI - Wisconsin</option>
                                        <option value="WV">WV - West Virginia</option>
                                        <option value="WY">WY - Wyoming</option>
                                        <optgroup label="US Military">
                                            <option value="AA">Armed Forces Americas</option>
                                            <option value="AE">Armed Forces Europe</option>
                                            <option value="AP">Armed Forces Pacific</option>
                                        </optgroup>
                                        <optgroup label="US Territories">
                                            <option value="AS">American Samoa</option>
                                            <option value="GU">Guam</option>
                                            <option value="MP">Northern Mariana Islands</option>
                                            <option value="PR">Puerto Rico</option>
                                            <option value="VI">US Virgin Islands</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>

                            <div class="toggleItem">
                                <input type="checkbox" name="send_lawsuit" id="send-lawsuit-toggle" value="toggle"
                                    onclick="$('#form_group_lawsuit').toggle('slow');">
                            </div>


                            <div id="form_group_lawsuit" style="display: none;">

                                <div class="input mb-3">
                                    <label class="form-label-head" for="attorney_email">Attorney
                                        Email</label>
                                    <input type="text" name="attorney_email" id="attorney_email">
                                </div>

                                <div class="inputs">
                                    <div class="input">
                                        <label class="form-label-head" for="attorney_first_name">Attorney
                                            First Name</label>
                                        <input type="text" name="attorney_first_name" id="attorney_first_name">
                                    </div>
                                    <div class="input">
                                        <label class="form-label-head" for="attorney_last_name">Attorney
                                            Last Name</label>
                                        <input type="text" name="attorney_last_name" id="attorney_last_name">
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="optional Panel" id="optional-items-tab-pane">
                            <h2>Optional Items</h2>

                            <div class="toggleBtns" id="toggleBtns">
                                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="toggleItem">
                                        <input type="checkbox" name="service<?php echo e($service->id); ?>" id="service<?php echo e($service->id); ?>"
                                        nm="<?php echo e($service->name); ?>" value="<?php echo e($service->price); ?>">
                                        <?php echo e($service->name); ?> <img src="<?php echo e(asset('frontend/images/questionGrey.png')); ?>"
                                            alt="">
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>


                            <button type="submit">Submit</button>

                        </div>

                        <div class="payment Panel " id="payment-tab-pane">
                            <h2>Payment Information</h2>

                            <div class="paymentOptions">
                                <div class="paymentOption">
                                    <input type="radio" checked name="payment">
                                </div>
                                <div class="paymentOption">
                                    <input type="radio" name="payment">
                                </div>
                                <div class="paymentOption">
                                    <input type="radio" name="payment">
                                </div>
                                <div class="paymentOption">
                                    <input type="radio" name="payment">
                                </div>
                            </div>
                            <div class="inputs">
                                <div class="input">
                                    <label for="">Cardholder First Name</label>
                                    <input type="text" type="text" name="billing_first_name"
                                        id="billing_first_name" placeholder="">
                                </div>
                                <div class="input">
                                    <label for="">Cardholder Last Name</label>
                                    <input type="text" type="text" name="billing_last_name" id="billing_last_name"
                                        placeholder="">
                                </div>
                            </div>
                            <div class="input">
                                <label for="">Card Number</label>
                                <input type="text" name="card_number" id="card_number" maxlength="21"
                                    placeholder="XXXX  XXXX  XXXX  XXXX">
                            </div>
                            <div class="threeInputs">
                                <div class="input">
                                    <label for="">Expiration Date</label>
                                    <input type="text" name="exp_month" id="exp_month" pattern="0[1-9]|1[0-2]"
                                        maxlength="2" placeholder="MM">
                                </div>
                                <div class="input" style="justify-content: flex-end;">
                                    <label for=""></label>
                                    <input type="text" name="exp_year" id="exp_year"
                                        pattern="20[1-9][2-9]|20[2-9][0-9]" maxlength="4" placeholder="YYYY">
                                </div>
                                <div class="input">
                                    <label for="">CVV</label>
                                    <input type="text" name="cvv" id="cvv" pattern="[0-9]{3,4}"
                                        maxlength="4">
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="113" height="31"
                                    viewBox="0 0 113 31" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M4.52246 0H107.785C110.283 0 112.308 2.01762 112.308 4.50697V26.2907C112.308 28.78 110.283 30.7976 107.785 30.7976H4.52246C2.02455 30.7976 0 28.78 0 26.2907V4.50697C0 2.01762 2.02455 0 4.52246 0Z"
                                        fill="#26382B" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M53.8199 19.9996H52.7179L53.5711 17.8994L51.873 13.629H53.0375L54.1048 16.5353L55.1804 13.629H56.3449L53.8199 19.9996ZM49.5876 18.1653C49.2055 18.1653 48.8143 18.0241 48.4585 17.7491V18.0594H47.3211V11.6888H48.4585V13.931C48.8143 13.6651 49.2055 13.5231 49.5876 13.5231C50.7793 13.5231 51.5971 14.4801 51.5971 15.8442C51.5971 17.2083 50.7793 18.1653 49.5876 18.1653ZM49.3479 14.4974C49.0366 14.4974 48.7253 14.6303 48.4585 14.8962V16.7922C48.7253 17.0581 49.0366 17.191 49.3479 17.191C49.9879 17.191 50.4326 16.6419 50.4326 15.8442C50.4326 15.0472 49.9879 14.4974 49.3479 14.4974ZM42.715 17.7491C42.3683 18.0241 41.9771 18.1653 41.5859 18.1653C40.4033 18.1653 39.5772 17.2083 39.5772 15.8442C39.5772 14.4801 40.4033 13.5231 41.5859 13.5231C41.9771 13.5231 42.3683 13.6651 42.715 13.931V11.6888H43.8622V18.0594H42.715V17.7491ZM42.715 14.8962C42.4572 14.6303 42.1459 14.4974 41.8346 14.4974C41.1856 14.4974 40.7417 15.0472 40.7417 15.8442C40.7417 16.6419 41.1856 17.191 41.8346 17.191C42.1459 17.191 42.4572 17.0581 42.715 16.7922V14.8962ZM35.9403 16.1544C36.0112 16.8275 36.5448 17.2887 37.2918 17.2887C37.7003 17.2887 38.1541 17.1377 38.6161 16.8718V17.8198C38.1096 18.0504 37.6031 18.1653 37.1049 18.1653C35.7625 18.1653 34.8203 17.191 34.8203 15.8089C34.8203 14.4711 35.7451 13.5231 37.0159 13.5231C38.1805 13.5231 38.9719 14.4358 38.9719 15.7383C38.9719 15.8622 38.9719 16.0034 38.9538 16.1544H35.9403ZM36.9715 14.4005C36.4205 14.4005 35.9939 14.8076 35.9403 15.419H37.8782C37.8428 14.8166 37.478 14.4005 36.9715 14.4005ZM32.9442 15.0998V18.0594H31.8061V13.629H32.9442V14.0722C33.2638 13.7177 33.655 13.5231 34.0371 13.5231C34.1623 13.5231 34.2866 13.5321 34.411 13.5674V14.5777C34.2866 14.5417 34.1442 14.5244 34.0108 14.5244C33.6377 14.5244 33.2374 14.728 32.9442 15.0998ZM27.867 16.1544C27.9386 16.8275 28.4715 17.2887 29.2185 17.2887C29.6277 17.2887 30.0807 17.1377 30.5435 16.8718V17.8198C30.0363 18.0504 29.5298 18.1653 29.0315 18.1653C27.6891 18.1653 26.7469 17.191 26.7469 15.8089C26.7469 14.4711 27.6718 13.5231 28.9426 13.5231C30.1079 13.5231 30.8986 14.4358 30.8986 15.7383C30.8986 15.8622 30.8986 16.0034 30.8812 16.1544H27.867ZM28.8981 14.4005C28.3471 14.4005 27.9205 14.8076 27.867 15.419H29.8056C29.7694 14.8166 29.4054 14.4005 28.8981 14.4005ZM23.8925 18.0594L22.9858 15.0472L22.0881 18.0594H21.0652L19.5366 13.629H20.674L21.5725 16.6419L22.4702 13.629H23.5013L24.399 16.6419L25.2975 13.629H26.4349L24.9146 18.0594H23.8925ZM16.94 18.1653C15.5976 18.1653 14.6464 17.2001 14.6464 15.8442C14.6464 14.4801 15.5976 13.5231 16.94 13.5231C18.2824 13.5231 19.2246 14.4801 19.2246 15.8442C19.2246 17.2001 18.2824 18.1653 16.94 18.1653ZM16.94 14.4711C16.2729 14.4711 15.8109 15.0292 15.8109 15.8442C15.8109 16.6592 16.2729 17.2173 16.94 17.2173C17.598 17.2173 18.0601 16.6592 18.0601 15.8442C18.0601 15.0292 17.598 14.4711 16.94 14.4711ZM11.9434 15.8712H10.9206V18.0594H9.7832V11.9637H11.9434C13.1879 11.9637 14.0765 12.7697 14.0765 13.922C14.0765 15.0735 13.1879 15.8712 11.9434 15.8712ZM11.7829 12.8854H10.9206V14.9496H11.7829C12.4409 14.9496 12.9029 14.5334 12.9029 13.922C12.9029 13.3015 12.4409 12.8854 11.7829 12.8854ZM103.133 16.4264H97.6681C97.7925 17.7304 98.7512 18.1142 99.8389 18.1142C100.948 18.1142 101.82 17.8821 102.582 17.499V19.7405C101.823 20.1589 100.822 20.4616 99.4869 20.4616C96.7682 20.4616 94.8627 18.7647 94.8627 15.4093C94.8627 12.5759 96.4787 10.3254 99.1349 10.3254C101.787 10.3254 103.17 12.5751 103.17 15.4243C103.17 15.6932 103.146 16.2761 103.133 16.4264ZM99.1168 12.5939C98.4188 12.5939 97.6432 13.119 97.6432 14.3727H100.529C100.529 13.1205 99.8027 12.5939 99.1168 12.5939ZM90.4352 20.4616C89.4583 20.4616 88.8614 20.0507 88.4604 19.7578L88.4544 22.9059L85.6633 23.4978L85.6618 10.511H88.1205L88.2652 11.1983C88.6518 10.8385 89.3581 10.3254 90.4525 10.3254C92.413 10.3254 94.2597 12.0854 94.2597 15.3244C94.2597 18.8601 92.4326 20.4616 90.4352 20.4616ZM89.7855 12.79C89.144 12.79 88.743 13.0236 88.4521 13.3413L88.4687 17.4757C88.7393 17.7679 89.1305 18.0038 89.7855 18.0038C90.8173 18.0038 91.5093 16.8838 91.5093 15.386C91.5093 13.9302 90.8068 12.79 89.7855 12.79ZM81.7189 10.511H84.5213V20.2625H81.7189V10.511ZM81.7189 7.39739L84.5213 6.80322V9.06948L81.7189 9.66289V7.39739ZM78.8238 13.6516V20.2625H76.0334V10.511H78.4469L78.6225 11.3335C79.2753 10.1361 80.5808 10.3788 80.9524 10.5117V13.0687C80.5974 12.9545 79.4833 12.7877 78.8238 13.6516ZM72.9318 16.841C72.9318 18.4808 74.6933 17.9707 75.0513 17.828V20.0928C74.679 20.2963 74.0044 20.4616 73.0916 20.4616C71.4349 20.4616 70.1919 19.2455 70.1919 17.5982L70.204 8.67211L72.9295 8.09522L72.9318 10.511H75.0521V12.8831H72.9318V16.841ZM69.5445 17.3157C69.5445 19.3183 67.945 20.4616 65.6235 20.4616C64.661 20.4616 63.6087 20.2753 62.5708 19.8299V17.1738C63.5077 17.6815 64.7017 18.0624 65.6265 18.0624C66.2491 18.0624 66.6976 17.8956 66.6976 17.3818C66.6976 16.0538 62.4533 16.5541 62.4533 13.4735C62.4533 11.504 63.963 10.3254 66.2272 10.3254C67.1521 10.3254 68.0769 10.4674 69.0018 10.8347V13.4548C68.1523 12.9981 67.0744 12.7389 66.225 12.7389C65.6401 12.7389 65.2768 12.9072 65.2768 13.3421C65.2768 14.5935 69.5445 13.9986 69.5445 17.3157Z"
                                        fill="white" />
                                </svg>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="right">
                    <h2>Order Summary</h2>
                    <div class="item">
                        <p>Registered Agent for WY(<span id="company_text">LLC
                            </span>)</p>
                        <p>$<?php echo e($agent_fixed_price); ?></p>
                    </div>
                    
                    <div class="total">
                        <p>Order Total</p>
                        <p class="price">$<?php echo e($agent_fixed_price); ?></p>
                    </div>


                    <button type="button" id="my-button" onClick="Validate()" class="btn_continue">Continue<img
                            src="<?php echo e(asset('frontend/images/arrowright.png')); ?>" alt=""></button>


                    <button type="submit" id="my-button" name="myButton" class="btn_done justify-content-center"
                        style="display:none;">DONE</button>

                    <p class="question">
                        Questions? <span> Call 307-317-3131</span>
                    </p>

                    <p class="lastP">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path
                                d="M11.95 18C12.3 18 12.596 17.879 12.838 17.637C13.08 17.395 13.2007 17.0993 13.2 16.75C13.2 16.4 13.0793 16.104 12.838 15.862C12.5967 15.62 12.3007 15.4993 11.95 15.5C11.6 15.5 11.3043 15.621 11.063 15.863C10.8217 16.105 10.7007 16.4007 10.7 16.75C10.7 17.1 10.821 17.396 11.063 17.638C11.305 17.88 11.6007 18.0007 11.95 18ZM11.05 14.15H12.9C12.9 13.6 12.9627 13.1667 13.088 12.85C13.2133 12.5333 13.5673 12.1 14.15 11.55C14.5833 11.1167 14.925 10.704 15.175 10.312C15.425 9.92 15.55 9.44933 15.55 8.9C15.55 7.96667 15.2083 7.25 14.525 6.75C13.8417 6.25 13.0333 6 12.1 6C11.15 6 10.379 6.25 9.787 6.75C9.195 7.25 8.78267 7.85 8.55 8.55L10.2 9.2C10.2833 8.9 10.471 8.575 10.763 8.225C11.055 7.875 11.5007 7.7 12.1 7.7C12.6333 7.7 13.0333 7.846 13.3 8.138C13.5667 8.43 13.7 8.75067 13.7 9.1C13.7 9.43333 13.6 9.746 13.4 10.038C13.2 10.33 12.95 10.6007 12.65 10.85C11.9167 11.5 11.4667 11.9917 11.3 12.325C11.1333 12.6583 11.05 13.2667 11.05 14.15ZM12 22C10.6167 22 9.31667 21.7373 8.1 21.212C6.88333 20.6867 5.825 19.9743 4.925 19.075C4.025 18.175 3.31267 17.1167 2.788 15.9C2.26333 14.6833 2.00067 13.3833 2 12C2 10.6167 2.26267 9.31667 2.788 8.1C3.31333 6.88333 4.02567 5.825 4.925 4.925C5.825 4.025 6.88333 3.31267 8.1 2.788C9.31667 2.26333 10.6167 2.00067 12 2C13.3833 2 14.6833 2.26267 15.9 2.788C17.1167 3.31333 18.175 4.02567 19.075 4.925C19.975 5.825 20.6877 6.88333 21.213 8.1C21.7383 9.31667 22.0007 10.6167 22 12C22 13.3833 21.7373 14.6833 21.212 15.9C20.6867 17.1167 19.9743 18.175 19.075 19.075C18.175 19.975 17.1167 20.6877 15.9 21.213C14.6833 21.7383 13.3833 22.0007 12 22ZM12 20C14.2333 20 16.125 19.225 17.675 17.675C19.225 16.125 20 14.2333 20 12C20 9.76667 19.225 7.875 17.675 6.325C16.125 4.775 14.2333 4 12 4C9.76667 4 7.875 4.775 6.325 6.325C4.775 7.875 4 9.76667 4 12C4 14.2333 4.775 16.125 6.325 17.675C7.875 19.225 9.76667 20 12 20Z"
                                fill="#557D60" />
                        </svg>
                        What happens after I pay?
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Start-->
    
    <!-- End-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    



    <script !src="">
        $(document).ready(function() {
            $('#toggleBtns input[type="checkbox"]').on('change', function() {
                var isChecked = $(this).prop("checked");
                var value = $(this).val();
                var name = $(this).attr('nm');
                // Find the Order Summary and Total elements
                var $orderSummary = $('h2:contains("Order Summary")');
                var $totalDiv = $('.total');

                if (isChecked) {
                    $orderSummary.after('<div class="item"><p>' + name + '</p><p>$' + value + '</p></div>');
                } else {
                    // Remove the item from the Order Summary
                    $orderSummary.next('.item:contains("' + name + '")').remove();
                }

                // Calculate and update the total
                var total = 0;
                $('.item p:last-child').each(function() {
                    total += parseFloat($(this).text().replace('$', ''));
                });

                // Update the Total div
                $totalDiv.find('p.price').text('$' + total.toFixed(2));

            });
        });

        const SelectService = (e, value) => {
            const options = document.querySelectorAll(".inputdiv");
            const membervalueElement = document.querySelector(".membervalue");
            if (membervalueElement) {
                membervalueElement.textContent = "1";
            }

            if (value == "member-manage") {
                $("#member").show();
                $("#manager").hide();
            } else {
                $("#member").hide();
                $("#manager").show();
            }

            for (let i = 0; i < options.length; i++) {
                options[i].classList.remove("active")
                options[i].querySelector("input").checked = false
            }
            e.classList.add("active")
            e.querySelector("input").checked = "true"
        }


        document.addEventListener('change', function(event) {
            if (event.target.classList.contains('address-select')) {
                Address(event.target);
            }
        });

        const Member = (e, value) => {
            e.preventDefault()
            const membervalue = document.querySelector(".membervalue");
            const newInputsDiv = document.getElementById('new_inputs');
            if (value == "add") {
                membervalue.innerHTML = parseInt(membervalue.innerHTML) + 1;

                var newInputsHTML = `<div id="add_inputs">
                                <div class="inputs">
                                    <div class="input">
                                        <label for="">First Name</label>
                                        <input type="text" name="member[0][first_name]" placeholder="Your First Name">
                                    </div>
                                    <div class="input">
                                        <label for="">Last Name</label>
                                        <input type="text" name="member[0][last_name]" placeholder="Your Last Name">
                                    </div>
                                </div>

                                <div class="input">
                                    <label for="">Address To Record With The State</label>
                                    <select name="member[0][address_selector]" id="member[0][address_selector]" onchange="AddressNew(this)">
                                        <option value="default">Our registered agent address</option>
                                        <option value="specifics">Specify Address</option>
                                    </select>
                                    <input type="text" hidden class="new_address" name="member[0][address]" placeholder="Your Address here..."
                                        style="border-radius: 0 0 .4rem .4rem;">
                                </div>
                            </div>`;

                newInputsDiv.insertAdjacentHTML('beforeend', newInputsHTML);

                const newSelect = newInputsDiv.querySelector('.address-select');
                newSelect.addEventListener('change', function() {
                    Address(this);
                });

            } else {
                if (parseInt(membervalue.innerHTML) == 1) return
                membervalue.innerHTML = parseInt(membervalue.innerHTML) - 1;

                const lastInputs = newInputsDiv.lastElementChild;
                if (lastInputs) {
                    newInputsDiv.removeChild(lastInputs);
                }
            }
        }

        const AddressNew = (e) => {
            const address = document.querySelector(".new_address")
            if (e.value == "specifics") {
                address.removeAttribute("hidden", "")
                e.style.borderRadius = ".4rem .4rem 0 0"
            } else {
                address.setAttribute("hidden", "")
                e.style.borderRadius = ".4rem"
            }
        }

        const Address = (e) => {
            const address = document.querySelector(".address")
            if (e.value == "specific") {
                address.removeAttribute("hidden", "")
                e.style.borderRadius = ".4rem .4rem 0 0"
            } else {
                address.setAttribute("hidden", "")
                e.style.borderRadius = ".4rem"
            }
        }

        $('.entity_select').on('change', function() {
            var corp = $(this).val();
            $("#company_text").html(corp);
        });


        // $("body").on("click", "div.remove-button", function() {
        //     var person = parseInt($(this).parent().find(".person-count").html());
        //     if (person > 1) {
        //         var decrement = person - 1;
        //         $(this).parent().find(".person-count").html(decrement);
        //         if (person <= 2) {
        //             $(this).parent().find(".remove-button").addClass("disabled-add-remove");
        //         }
        //         $(this).parent().parent().find(".add-remove-items:last").remove();
        //     }
        // });

        // $("body").on("change", ".optional-check", function() {
        //     $(".optional-sumarry").remove();
        //     var total = parseInt($(".item").attr("amt"));
        //     $(".optional-check").each(function() {
        //         var nm = $(this).attr("nm");
        //         var amount = $(this).val();
        //         var description = $(this).val();
        //         if ($(this).prop("checked") == true) {
        //             total = total + parseInt(amount);
        //             $(".summary").append("<li amt=\"" + amount +
        //                 "\" class=\"item-breakdown sum optional-sumarry filing-fee do-not-remove\">\n" +
        //                 "                                            <span class=\"line-item\">" + nm +
        //                 " </span>\n" +
        //                 "                                            <span class=\"item-cost\" >$" +
        //                 amount + ".00</span>\n" +
        //                 "                                        </li>");
        //         }
        //     });
        //     total = total.toFixed(2);

        //     total = "$ " + total;
        //     $(".grand-total").find(".item-cost").html(total);

        // });



        // $("div.add-button").click(function() {
        //     var person = parseInt($(this).parent().find(".person-count").html());
        //     var type_name = $(this).attr("type_name");
        //     var increment = person + 1;
        //     $(this).parent().find(".person-count").html(increment);
        //     $(this).parent().find(".remove-button").removeClass("disabled-add-remove");
        //     $(this).parent().parent().append("<div class=\"add-remove-items mt-5\">\n" +
        //         "                                                <div class=\"form_group_input mb-3\">\n" +
        //         "                                                    <div class=\"row g-2 g-lg-4\">\n" +
        //         "                                                        <div class=\"col-md-6\">\n" +
        //         "                                                            <label class=\"form-label-head\" for=\"" +
        //         type_name + "[" + person + "][first_name]\">First Name</label>\n" +
        //         "                                                            <input class=\"form-control\" type=\"text\" name=\"" +
        //         type_name + "[" + person + "][first_name]\" id=\"" + type_name + "[" + person +
        //         "][first_name]\">\n" +
        //         "                                                        </div>\n" +
        //         "                                                        <div class=\"col-md-6\">\n" +
        //         "                                                            <label class=\"form-label-head\" for=\"" +
        //         type_name + "[" + person + "][last_name]\">Last Name</label>\n" +
        //         "                                                            <input class=\"form-control\" type=\"text\" name=\"" +
        //         type_name + "[" + person + "][last_name]\" id=\"" + type_name + "[" + person +
        //         "][last_name]\">\n" +
        //         "                                                        </div>\n" +
        //         "                                                    </div>\n" +
        //         "                                                    <div class=\"col-md-12\">\n" +
        //         "                                                        <label class=\"form-label-head\" for=\"" +
        //         type_name + "[" + person + "][address_selector]\">Address To Record With The State</label>\n" +
        //         "                                                        <select class=\"form-select person-address-select\" name=\"" +
        //         type_name + "[" + person + "][address_selector]\" id=\"" + type_name + "[" + person +
        //         "][address_selector]\">\n" +
        //         "                                                            <option value=\"Registered Agent Address\">Our registered agent address</option>\n" +
        //         "                                                            <option value=\"Specify Address\">Specify address</option>\n" +
        //         "                                                        </select>\n" +
        //         "                                                        <textarea class=\"form-control mt-\" name=\"" +
        //         type_name + "[" + person + "][address]\" id=\"" + type_name + "_" + person +
        //         "_address\" rows=\"6\" style=\"display: none;\"></textarea>\n" +
        //         "                                                    </div>\n" +
        //         "                                                </div>\n" +
        //         "                                            </div>");
        // })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp3\htdocs\wyoming_services\resources\views/frontend/agent.blade.php ENDPATH**/ ?>
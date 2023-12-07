@extends("frontend.layouts.master")
<?php
$setting = \App\Models\Setting::pluck('value','name')->toArray();
$auth_logo = isset($setting['auth_logo']) ? 'uploads/'.$setting['auth_logo'] : 'assets/media/logos/logo-light.png';
$auth_page_heading = isset($setting['auth_page_heading']) ? $setting['auth_page_heading'] : 'wwww.webexert.com';
$auth_image = isset($setting['auth_image']) ? 'uploads/'.$setting['auth_image'] : 'assets/media/svg/illustrations/login-visual-1.svg';
$copy_right = isset($setting['copy_right']) ? $setting['copy_right'] : 'wwww.webexert.com';
$stripe_client = isset($setting['stripe_client']) ? $setting['stripe_client'] : 'pk_test_0EgBbBMGnb4kCquzWTPh6dKC00glHV9dZS';
?>
@section("meta")
    <title>Place a Registered Agent Service Order - WY Commercial Registered Agent LLC</title>
    <style>
        .hide {
            display: none;
        }

        .person-address-select {
            margin-bottom: 15px;
        }
    </style>
@endsection
@section("content")
    <main class="d-flex flex-column justify-content-start flex-grow-1 ">

        <!-- Start-->
        <div class="content_section section_space">
            <div class="container">
                <div class="row mb-4">
                    <div class="col-md-12 text-center">
                        @include("client.partials._messages")
                        <h1>Wyoming Registered Agent</h1>
                    </div>
                </div>

                <div class="row">

                    <!-- Tabs Start-->
                    <div class="col-md-12 mb-5">
                        <div class="nav_tabs nav_tabs_steps">
                            <ul class="nav">
                                <li class="nav-item">
                                    <button class="nav-link active" id="order-tab" data-bs-toggle="tab" data-bs-target="#order-tab-pane" type="button">Order</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" id="company-tab" data-bs-toggle="tab" data-bs-target="#company-tab-pane" type="button">Company</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" id="management-tab" data-bs-toggle="tab" data-bs-target="#management-tab-pane" type="button">Management</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button">Contact</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" id="optional-items-tab" data-bs-toggle="tab" data-bs-target="#optional-items-tab-pane" type="button">Optional Items</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" id="payment-tab" data-bs-toggle="tab" data-bs-target="#payment-tab-pane" type="button">Payment</button>
                                </li>
                            </ul>

                            <!-- Mobile screen tab menu -->
                            <span class="toggle-form-step d-lg-none">
                                <i class="fa fa-bars me-2" aria-hidden="true"></i>
                                Step
                            </span>

                        </div>
                    </div>
                    <!-- Tabs End-->

                    <!-- Form Start-->
<!-- {{--                    <form class="col-md-12" action="#">--}} -->

                    <form role="form" action="{{ route('stripe.post') }}" method="post"  class="require-validation col-md-12"
                              data-cc-on-file="false"
                              data-stripe-publishable-key="{{ $stripe_client }}"
                              id="payment-form">
                            @csrf

                            <input type="hidden" value="1" name="agent">

                        <div class="row g-4">

                            <!-- Form tabs content Start-->
                            <div class="col-md-7 col-xxl-8">
                                <div class="tab-content" id="nav_tabs_content">

                                    <!-- Form tab Order Start-->
                                    <div class="tab-pane show active" id="order-tab-pane">
                                        <h4 class="mb-4">Order Information</h4>

                                        <!-- Option Group Start-->
                                        <div class="mb-5">
                                            <ul class="service_list">
                                                <li class="item-breakdown">
                                                    <span class="line-item fw-normal">1 Year Registered Agent</span>
                                                </li>
                                                <li class="item-breakdown">
                                                    <span class="line-item fw-normal">Order Filled In 24 Hours</span>
                                                </li>
                                                <li class="item-breakdown">
                                                    <span class="line-item fw-normal">Wyoming Address Use</span>
                                                </li>
                                                <li class="item-breakdown ">
                                                    <span class="line-item fw-normal">Mail Forwarding (scan)</span>
                                                </li>
                                                <li class="item-breakdown">
                                                    <span class="line-item fw-normal">No Identification Required</span>
                                                </li>
                                                <li class="item-breakdown">
                                                    <span class="line-item fw-normal">International Clients Welcome </span>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- Option Group End-->
                                    </div>
                                    <!-- Form tab Order End-->

                                    <!-- Form tab Company Start-->
                                    <div class="tab-pane" id="company-tab-pane">
                                        <h4 class="mb-4">Company Information</h4>

                                        <!-- Option Group Start-->
                                        <div class="form_group_input mb-4">
                                            <label class="form-label-head" for="company_name">Company Name</label>
                                            <input class="form-control" type="text" name="company_name" id="company_name" placeholder="Your Company Name">
                                        </div>
                                        <!-- Option Group End-->

                                        <!-- Option Group Start-->
                                        <div class="form_group_input">
                                            <label class="form-label-head" for="entity_type">Company Entity Type</label>
                                            <select class="form-select entity_select entity-type-select" name="entity_type" id="entity_type" onchange="if($(this).val() == 'Corp'){$('div[id^=group_type_]').hide();$('#group_type_Corp').show()}else if($(this).val() == 'NP_Corp'){$('div[id^=group_type_]').hide();$('#group_type_NP_Corp').show()}else{$('.group_type_entity').show();$('#group_type_NP_Corp').hide();$('#group_type_Corp').hide();}">
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
                                        <!-- Option Group End-->
                                    </div>
                                    <!-- Form tab Company End-->

                                    <!-- Form tab Company Management Start-->
                                    <div class="tab-pane" id="management-tab-pane">
                                        <h4 class="mb-4">Company Management</h4>

                                        <!-- LLC Group Start-->
                                        <div id="group_type_LLC" class="group_type_entity">
                                            <!-- Option Group Start-->
                                            <div class="form_group_input mb-5">
                                                <label class="form-label-head mb-3">Management Type</label>
                                                <div class="radio_check">
                                                    <input class="radio_check_input management_type" type="radio" name="management_type" id="management-type-member_managed" value="Member_Managed" checked>
                                                    <label class="radio_check_radio" for="management-type-member_managed"></label>
                                                    <label class="radio_check_label" for="management-type-member_managed">Member Managed</label>
                                                    <button type="button" class="btn_help ms-3" data-bs-toggle="modal" data-bs-target="#helpModal"
                                                            data-bs-helpTitle="Member Managed"
                                                            data-bs-helpText="<p>A member is also known as an owner. Selecting this option tells us that the company’s member (owner) is responsible for managing the company.</p>">
                                                        <i class="fa fa-question-circle"></i>
                                                    </button>
                                                </div>
                                                <div class="radio_check">
                                                    <input class="radio_check_input management_type" type="radio" name="management_type" id="management-type-manager_managed" value="Manager_Managed">
                                                    <label class="radio_check_radio" for="management-type-manager_managed"></label>
                                                    <label class="radio_check_label" for="management-type-manager_managed">Manager Managed</label>
                                                    <button type="button" class="btn_help ms-3" data-bs-toggle="modal" data-bs-target="#helpModal"
                                                            data-bs-helpTitle="Manager Managed"
                                                            data-bs-helpText="<p>Selecting this option will tell us that a person separate from a member/ owner is responsible for managing the company.</p>">
                                                        <i class="fa fa-question-circle"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <!-- Option Group End-->

                                            <!-- Option Group Start-->
                                            <div class="form_group_input mb-5" id="member">
                                                <label class="form-label-head mb-3">How Many Members Will Be In This Company?</label>

                                                <div class="add-remove-button-container d-flex mb-3">
                                                <span class="add-remove-button-label">
                                                    <span class="person-count">1</span> Member<span class="person-s">s</span>
                                                </span>
                                                    <div class="add-remove-button remove-button disabled-add-remove">
                                                        <span class="remove-button"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                    </div>
                                                    <div class="add-remove-button add-button" type_name="member">
                                                        <span class="add-button"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                    </div>
                                                </div>

                                                <div class="add-remove-items">
                                                    <div class="form_group_input mb-3">
                                                        <div class="row g-2 g-lg-4">
                                                            <div class="col-md-6">
                                                                <label class="form-label-head" for="member[0][first_name]">First Name</label>
                                                                <input class="form-control" type="text" name="member[0][first_name]" id="member[0][first_name]">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="form-label-head" for="member[0][last_name]">Last Name</label>
                                                                <input class="form-control" type="text" name="member[0][last_name]" id="member[0][last_name]">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="form-label-head" for="member[0][address_selector]">Address To Record With The State</label>
                                                            <select class="form-select person-address-select" name="member[0][address_selector]" id="member[0][address_selector]">
                                                                <option value="Registered Agent Address">Our registered agent address</option>
                                                                <option value="Specify Address">Specify address</option>
                                                            </select>
                                                            <textarea class="form-control" name="member[0][address]" id="member_0_address" rows="6" style="display: none;"></textarea>
                                                        </div>
                                                    </div>
                                                </div>



                                            </div>
                                            <!-- Option Group Start-->
                                            <div class="form_group_input mb-5" id="manager" style="display: none;">
                                                <label class="form-label-head mb-3">How Many Managers Will Be In This Company?</label>

                                                <div class="add-remove-button-container d-flex mb-3">
                                                <span class="add-remove-button-label">
                                                    <span class="person-count">1</span> Manager<span class="person-s">s</span>
                                                </span>
                                                    <div class="add-remove-button remove-button disabled-add-remove">
                                                        <span class="remove-button"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                    </div>
                                                    <div class="add-remove-button add-button" type_name="manager">
                                                        <span class="add-button"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                    </div>
                                                </div>

                                                <div class="add-remove-items">
                                                    <div class="form_group_input mb-3">
                                                        <div class="row g-2 g-lg-4">
                                                            <div class="col-md-6">
                                                                <label class="form-label-head" for="manager[0][first_name]">First Name</label>
                                                                <input class="form-control" type="text" name="manager[0][first_name]" id="manager[0][first_name]">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="form-label-head" for="manager[0][last_name]">Last Name</label>
                                                                <input class="form-control" type="text" name="manager[0][last_name]" id="manager[0][last_name]">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="form-label-head" for="manager[0][address_selector]">Address To Record With The State</label>
                                                            <select class="form-select person-address-select" name="manager[0][address_selector]" id="manager[0][address_selector]">
                                                                <option value="Registered Agent Address">Our registered agent address</option>
                                                                <option value="Specify Address">Specify address</option>
                                                            </select>
                                                            <textarea class="form-control" name="manager[0][address]" id="manager_0_address" rows="6" style="display: none;"></textarea>
                                                        </div>
                                                    </div>
                                                </div>



                                            </div>



                                        </div>
                                        <!-- LLC Group End-->

                                        <!-- Corp Group Start-->
                                        <div id="group_type_Corp" class="group_type_entity" style="display: none;">

                                            <!-- Corp Group President Start-->
                                            <div class="group_type_Corp_President mb-5">
                                                <h4 class="mb-3 fw-bold">
                                                    President
                                                    <!-- <button type="button" class="btn_help ms-3" data-bs-toggle="modal" data-bs-target="#helpModal"
                                                            data-bs-helpTitle="President"
                                                            data-bs-helpText="<p>The President of a corporation is basically the operations manager. The person in charge of day to day operations of the company</p>">
                                                        <i class="fa fa-question-circle"></i>
                                                    </button> -->
                                                </h4>

                                                <div class="form_group_input mb-3">
                                                    <div class="row g-2 g-lg-4">
                                                        <div class="col-md-6">
                                                            <label class="form-label-head" for="president[0][first_name]">First Name</label>
                                                            <input class="form-control" type="text" name="president[0][first_name]" id="president[0][first_name]">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label-head" for="president[0][last_name]">Last Name</label>
                                                            <input class="form-control" type="text" name="president[0][last_name]" id="president[0][last_name]">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mt-3">
                                                        <label class="form-label-head" for="president[0][address_selector]">Address</label>
                                                        <select class="form-select person-address-select" name="president[0][address_selector]" id="president[0][address_selector]">
                                                            <option value="Registered Agent Address">Our registered agent address</option>
                                                            <option value="Specify Address">Specify address</option>
                                                        </select>
                                                        <textarea class="form-control mt-3" name="president[0][address]" id="president_0_address" rows="6" style="display: none;"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Corp Group President End-->

                                            <!-- Corp Group Secretary Start-->
                                            <div class="group_type_Corp_Secretary mb-5">
                                                <h4 class="mb-3 fw-bold">
                                                    Secretary
                                                    <!-- <button type="button" class="btn_help ms-3" data-bs-toggle="modal" data-bs-target="#helpModal"
                                                            data-bs-helpTitle="Secretary"
                                                            data-bs-helpText="<p>The Secretary is in charge of documenting corporate transactions of importance like amendments to the company, filing annual reports, business licenses, and any kind of private documentation like shareholders.</p>">
                                                        <i class="fa fa-question-circle"></i>
                                                    </button> -->
                                                </h4>

                                                <div class="form_group_input mb-3">
                                                    <div class="row g-2 g-lg-4">
                                                        <div class="col-md-6">
                                                            <label class="form-label-head" for="secretary[0][first_name]">First Name</label>
                                                            <input class="form-control" type="text" name="secretary[0][first_name]" id="secretary[0][first_name]">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label-head" for="secretary[0][last_name]">Last Name</label>
                                                            <input class="form-control" type="text" name="secretary[0][last_name]" id="secretary[0][last_name]">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mt-3">
                                                        <label class="form-label-head" for="secretary[0][address_selector]">Address</label>
                                                        <select class="form-select person-address-select" name="secretary[0][address_selector]" id="secretary[0][address_selector]">
                                                            <option value="Registered Agent Address">Our registered agent address</option>
                                                            <option value="Specify Address">Specify address</option>
                                                        </select>
                                                        <textarea class="form-control mt-3" name="secretary[0][address]" id="secretary" rows="6" style="display: none;"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Corp Group Secretary End-->

                                            <!-- Corp Group Treasurer Start-->
                                            <div class="group_type_Corp_Treasurer mb-5">
                                                <h4 class="mb-3 fw-bold">
                                                    Treasurer
                                                    <!-- <button type="button" class="btn_help ms-3" data-bs-toggle="modal" data-bs-target="#helpModal"
                                                            data-bs-helpTitle="Treasurer"
                                                            data-bs-helpText="<p>The Treasurer is in charge of the financial transactions of the company</p>">
                                                        <i class="fa fa-question-circle"></i>
                                                    </button> -->
                                                </h4>

                                                <div class="form_group_input mb-3">
                                                    <div class="row g-2 g-lg-4">
                                                        <div class="col-md-6">
                                                            <label class="form-label-head" for="treasurer[0][first_name]">First Name</label>
                                                            <input class="form-control" type="text" name="treasurer[0][first_name]" id="treasurer[0][first_name]">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label-head" for="treasurer[0][last_name]">Last Name</label>
                                                            <input class="form-control" type="text" name="treasurer[0][last_name]" id="treasurer[0][last_name]">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mt-3">
                                                        <label class="form-label-head" for="treasurer[0][address_selector]">Address</label>
                                                        <select class="form-select person-address-select" name="treasurer[0][address_selector]" id="treasurer[0][address_selector]">
                                                            <option value="Registered Agent Address">Our registered agent address</option>
                                                            <option value="Specify Address">Specify address</option>
                                                        </select>
                                                        <textarea class="form-control mt-3" name="treasurer[0][address]" id="treasurer" rows="6" style="display: none;"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Corp Group Treasurer End-->
											
											<!-- Option Group Start-->
											<div class="form_group_input mb-5">
                                                <label class="form-label-head d-block mb-3">Share Type</label>
												
												<div class="radio_check d-inline-block me-2">
													<input class="radio_check_input" type="radio" name="share_type_common" id="share_type_common" value="Common_Share">
													<label class="radio_check_radio" for="share_type_common"></label>
													<label class="radio_check_label" for="share_type_common">Common Share</label>
												</div>
												<div class="radio_check d-inline-block me-2">
													<input class="radio_check_input" type="radio" name="share_type_preffered" id="share_type_preferred" value="Preferred_Share">
													<label class="radio_check_radio" for="share_type_preferred"></label>
													<label class="radio_check_label" for="share_type_preferred">Preferred Shares</label>
												</div>
												<div class="radio_check d-inline-block">
													<input class="radio_check_input" type="radio" name="share_type" id="share_type_both" value="Both_Common_and_Preferred" checked="">
													<label class="radio_check_radio" for="share_type_both"></label>
													<label class="radio_check_label" for="share_type_both">Both Common and Preferred</label>
												</div>
												
												<div class="share_type_group mt-4" id="common">
													<div class="row g-2 mb-4" id="share_type_group_common">
														<label class="form-label-head d-block mb-2 text-decoration-underline">Common Share</label>
														<div class="col-md-6">
															<label class="form-label-head" for="Number_Common_Shares">Number Common Shares</label>
															<input class="form-control" type="text" name="Number_Common_Shares" id="Number_Common_Shares">
														</div>
														<div class="col-md-6">
															<label class="form-label-head" for="Par_Value_Common_Share">Par Value Common Share</label>
															<input class="form-control" type="text" name="Par_Value_Common_Share" id="Par_Value_Common_Share">
														</div>
													</div>
													
													<div class="row g-2" id="share_type_group_preferred" id="preffered">
														<label class="form-label-head d-block mb-2 text-decoration-underline">Preferred Share</label>
														<div class="col-md-6">
															<label class="form-label-head" for="Number_Preferred_Shares">Number Preferred Shares</label>
															<input class="form-control" type="text" name="Number_Preferred_Shares" id="Number_Preferred_Shares">
														</div>
														<div class="col-md-6">
															<label class="form-label-head" for="Par_Value_Preferred_Share">Par Value Preferred Share</label>
															<input class="form-control" type="text" name="Par_Value_Preferred_Share" id="Par_Value_Preferred_Share">
														</div>
													</div>
												</div>
												
                                            </div>
											<!-- Option Group End-->

                                            <!-- Option Group Start-->
                                            <div class="form_group_input mb-3">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" name="officers-are-directors-yes" id="officers-are-directors-yes" value="yes" onclick="$('#officers-are-directors-no').toggle('slow');">
                                                    <label class="form-check-label" for="officers-are-directors-yes">All Officers Are Directors</label>
                                                </div>
                                            </div>
                                            <!-- Option Group End-->

                                            <!-- Option Group Start-->
                                            <div class="form_group_input mb-5">
                                                <div class="row g-2 g-lg-4">
                                                    <div class="col-md-6">
                                                        <label class="form-label-head" for="par_value">Par value
                                                            <!-- <button type="button" class="btn_help ms-2" data-bs-toggle="modal" data-bs-target="#helpModal"
                                                                    data-bs-helpTitle="Par Value"
                                                                    data-bs-helpText="<p>The par value of a share of corporate stock is the minimum amount that share can be sold for. Most small businesses make a par value of $1. Par value for most corporations is a completely pointless term, but you&#8217;re forming the same corporate entity as a fortune 500 company has, so it has to be there and you have to deal with it.</p>
                                                                    <p>When par value becomes interesting:</p>
                                                                    <p>If you are going into business with a partner and you both bring $50,000 to the table to get the business going. You could make the par value high enough that your partner couldn&#8217;t just sell their shares easily. If you had 1000 shares and each of you have 500 shares, you could make each par value of the shares be 100. Then for your partner to easily get out of the company, you assure that someone coming in has a decent amount of money in their bank account. It also provides a little bit of security if your partner some day forces you out that you will have to get paid more for your shares.</p>
                                                                    <p>Most people do a par value of $1.00 or even 1 cent.</p>">
                                                                <i class="fa fa-question-circle"></i>
                                                            </button> -->
                                                        </label>
                                                        <input class="form-control" type="text" name="par_value" id="par_value">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label-head" for="shares_to_authorize">Number of shares to authorize
                                                            <!-- <button type="button" class="btn_help ms-2" data-bs-toggle="modal" data-bs-target="#helpModal"
                                                                    data-bs-helpTitle="Number of shares to authorize"
                                                                    data-bs-helpText="<p>When you create a corporation, you must come up with a number of shares you authorize creation of. At this point, NO shares have been given out. This is just creating the shares. Most people make 100 shares.</p>
                                                                    <p>If you are a single owner of a corporation, most people would create 100 shares with a par value of $1.00. After we&#8217;re all done with filing and creating your corporation, privately, you &#8220;issue&#8221; yourself 51 of the 100 authorized shares so that you have the majority. That leaves you 49 shares left to issue to a potential investor you may want to bring on someday. The amount of shares you authorize can always be amended later by filing articles of amendment.</p>
                                                                    <p>Most people authorize 100 shares.</p>">
                                                                <i class="fa fa-question-circle"></i>
                                                            </button> -->
                                                        </label>
                                                        <input class="form-control" type="text" name="shares_to_authorize" id="shares_to_authorize">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Option Group End-->

                                            <!-- Option Group Start-->
                                            <div class="form_group_input mb-5" id="officers-are-directors-no" >
                                                <label class="form-label-head mb-3">How Many Directors Will Be In This Company?</label>

                                                <div class="add-remove-button-container person-director d-flex mb-3">
                                                    <span class="add-remove-button-label">
                                                        <span class="person-count">1</span> Director<span class="person-s">s</span>
                                                    </span>
                                                    <div class="add-remove-button remove-button disabled-add-remove">
                                                        <span class="remove-button"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                    </div>
                                                    <div class="add-remove-button add-button" type_name="director">
                                                        <span class="add-button"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                    </div>
                                                </div>

                                                <div class="add-remove-items">
                                                    <div class="form_group_input mb-4">
                                                        <div class="row g-2 g-lg-4">
                                                            <div class="col-md-6">
                                                                <label class="form-label-head" for="director[0][first_name]">First Name</label>
                                                                <input class="form-control" type="text" name="director[0][first_name]" id="director[0][first_name]">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="form-label-head" for="director[0][last_name]">Last Name</label>
                                                                <input class="form-control" type="text" name="director[0][last_name]" id="director[0][last_name]">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 mt-3">
                                                            <label class="form-label-head" for="director[0][address_selector]">Address</label>
                                                            <select class="form-select person-address-select" name="director[0][address_selector]" id="director[0][address_selector]">
                                                                <option value="Registered Agent Address">Our registered agent address</option>
                                                                <option value="Specify Address">Specify address</option>
                                                            </select>
                                                            <textarea class="form-control mt-3" name="director[0][address]" id="director_0_address" rows="6" style="display: none;"></textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- Option Group End-->

                                        </div>
                                        <!-- Corp Group End-->

                                        <!-- NP Corp Group Start-->
                                        <div id="group_type_NP_Corp" class="group_type_entity" style="display: none;">

                                            <!-- Option Group Start-->
                                            <div class="form_group_input mb-5">
                                                <label class="form-label-head mb-3">Type Of Nonprofit</label>
                                                <div class="radio_check">
                                                    <input class="radio_check_input" type="radio" name="np_director[0][non_profit_type]" id="non-profit-type-public_benefit_corp" value="public benefit corp" checked>
                                                    <label class="radio_check_radio" for="non-profit-type-public_benefit_corp"></label>
                                                    <label class="radio_check_label" for="non-profit-type-public_benefit_corp">Public benefit corp</label>
                                                </div>
                                                <div class="radio_check">
                                                    <input class="radio_check_input" type="radio" name="np_director[0][non_profit_type]" id="non-profit-type-mutual_benefit_corp" value="mutual benefit corp">
                                                    <label class="radio_check_radio" for="non-profit-type-mutual_benefit_corp"></label>
                                                    <label class="radio_check_label" for="non-profit-type-mutual_benefit_corp">Mutual benefit corp</label>
                                                </div>
                                                <div class="radio_check">
                                                    <input class="radio_check_input" type="radio" name="np_director[0][non_profit_type]" id="non-profit-type-religious_corp" value="religious corp">
                                                    <label class="radio_check_radio" for="non-profit-type-religious_corp"></label>
                                                    <label class="radio_check_label" for="non-profit-type-religious_corp">Religious corp</label>
                                                </div>
                                            </div>
                                            <!-- Option Group End-->

                                            <!-- Option Group Start-->
                                            <div class="form_group_input mb-5">
                                                <label class="form-label-head mb-3">Apply for Tax Exempt Status</label>
                                                <div class="radio_check">
                                                    <input class="radio_check_input" type="radio" name="np_director[0][np_tax_Exempt]" id="non-profit-type-non-profit-tax-exempt-no" value="0" checked>
                                                    <label class="radio_check_radio" for="non-profit-type-non-profit-tax-exempt-no"></label>
                                                    <label class="radio_check_label" for="non-profit-type-non-profit-tax-exempt-no">No</label>
                                                </div>
                                                <div class="radio_check">
                                                    <input class="radio_check_input" type="radio" name="np_director[0][np_tax_Exempt]" id="non-profit-type-non-profit-tax-exempt-yes" value="1">
                                                    <label class="radio_check_radio" for="non-profit-type-non-profit-tax-exempt-yes"></label>
                                                    <label class="radio_check_label" for="non-profit-type-non-profit-tax-exempt-yes">Yes</label>
                                                </div>
                                            </div>

                                            <!-- Option Group Start-->
                                            <div class="form_group_input mb-5">
                                                <label class="form-label-head mb-3">How Many Directors Will Be In This Company?</label>

                                                <div class="add-remove-button-container d-flex mb-3">
                                                    <span class="add-remove-button-label">
                                                        <span class="person-count">1</span> Director<span class="person-s">s</span>
                                                    </span>
                                                    <div class="add-remove-button remove-button disabled-add-remove">
                                                        <span class="remove-button"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                    </div>
                                                    <div class="add-remove-button add-button" type_name="np_director">
                                                        <span class="add-button"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                    </div>
                                                </div>

                                                <div class="add-remove-items">
                                                    <div class="form_group_input mb-4">
                                                        <div class="row g-2 g-lg-4">
                                                            <div class="col-md-6">
                                                                <label class="form-label-head" for="np_director[0][first_name]">First Name</label>
                                                                <input class="form-control" type="text" name="np_director[0][first_name]" id="np_director[0][first_name]">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="form-label-head" for="np_director[0][last_name]">Last Name</label>
                                                                <input class="form-control" type="text" name="np_director[0][last_name]" id="np_director[0][last_name]">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 mt-4">
                                                            <label class="form-label-head" for="np_director[0][address_selector]">Address</label>
                                                            <select class="form-select person-address-select" name="np_director[0][address_selector]" id="np_director[0][address_selector]">
                                                                <option value="Registered Agent Address">Our registered agent address</option>
                                                                <option value="Specify Address">Specify address</option>
                                                            </select>
                                                            <textarea class="form-control mt-3" name="np_director[0][address]" id="np_director_0_address" rows="6" style="display: none;"></textarea>
                                                        </div>
                                                    </div>



                                                </div>

                                            </div>
                                            <!-- Option Group End-->
                                        </div>
                                        <!-- NP Corp Group End-->
                                    </div>
                                    <!-- Form tab Company Management Start-->

                                    <!-- Form tab Contact Start-->
                                    <div class="tab-pane" id="contact-tab-pane">
                                        <h4 class="mb-4">Contact Details</h4>

                                        <!-- Option Group Start-->
                                        <div class="form_group_input mb-2">
                                            <div class="row g-2 g-lg-4">
                                                <div class="col-md-6">
                                                    <label class="form-label-head" for="first_name">First Name</label>
                                                    <input class="form-control" type="text" name="first_name" id="first_name">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label-head" for="last_name">Last Name</label>
                                                    <input class="form-control" type="text" name="last_name" id="last_name">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Option Group End-->

                                        <!-- Option Group Address Start-->
                                        <div class="group_address">
                                            <!-- Option Group Start-->
                                            <div class="form_group_input mb-3">
                                                <label class="form-label-head" for="mailing_address_address_line1">Mailing Address</label>
                                                <input class="form-control" type="text" name="mailing_address[address_line1]" id="mailing_address_address_line1">
                                            </div>
                                            <!-- Option Group End-->

                                            <!-- Option Group Start-->
                                            <div class="form_group_input mb-2">
                                                <div class="row row-cols-1 row-cols-md-3 g-2 g-lg-4">
                                                    <div class="col">
                                                        <label class="form-label-head" for="mailing_address_address_code">
                                                            <span class="usa-data">Zip</span>
                                                            <span class="non-usa-data" style="display: none;">Postal</span>
                                                            Code</label>
                                                        <input class="form-control" type="text" name="mailing_address[address_code]" id="mailing_address_address_code">
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-label-head" for="mailing_address_city">City</label>
                                                        <input class="form-control" type="text" name="mailing_address[city]" id="mailing_address_city">
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-label-head" for="mailing_address_address_state">
                                                            <span class="usa-data">State</span>
                                                            <span class="non-usa-data" style="display: none;">Province</span>
                                                        </label>

                                                        <input class="form-control non-usa-data" type="text" name="mailing_address[address_province]">

                                                        <select class="form-select usa-data" id="mailing_address_address_state" name="mailing_address[address_state]" style="display: none;">
                                                            <option selected="" disabled="" value="">Select state</option>
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
                                            </div>
                                            <!-- Option Group End-->

                                            <!-- Option Group Start-->
                                            <div class="form_group_input mb-2">
                                                <div class="row g-2 g-lg-4">
                                                    <div class="col-md-6">
                                                        <label class="form-label-head" for="mailing_address_address_country">Country</label>
                                                        <select class="form-select verifiable_address_field" id="mailing_address_address_country" name="mailing_address[address_country]">
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
                                                            <option value="CD">Democratic Republic of the Congo</option>
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
                                                            <option value="HM">Heard Island and McDonald Islands</option>
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
                                                            <option value="VC">Saint Vincent and the Grenadines</option>
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
                                                            <option value="GS">South Georgia and the South Sandwich Islands</option>
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
                                                    <div class="col-md-6">
                                                        <label class="form-label-head" for="phone_number">Phone</label>
                                                        <input class="form-control" type="tel" name="phone_number" id="phone_number" >
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Option Group End-->
                                        </div>
                                        <!-- Option Group Address End-->

                                        <!-- Option Group Start-->
                                        <div class="form_group_input">
                                            <div class="form-check form-switch mb-3">
                                                <input class="form-check-input" type="checkbox" name="send_lawsuit" id="send-lawsuit-toggle" value="toggle" onclick="$('#form_group_lawsuit').toggle('slow');">
                                                <label class="form-check-label" for="send-lawsuit-toggle">Send a copy of lawsuits and legal notices to your attorney</label>
                                            </div>

                                            <!-- Option Group Lawsuit Start-->
                                            <div id="form_group_lawsuit" style="display: none;">

                                                <div class="form_group_input mb-3">
                                                    <label class="form-label-head" for="attorney_email">Attorney Email</label>
                                                    <input class="form-control" type="text" name="attorney_email" id="attorney_email">
                                                </div>
                                                <div class="row g-2 g-lg-4">
                                                    <div class="col-md-6">
                                                        <label class="form-label-head" for="attorney_first_name">Attorney First Name</label>
                                                        <input class="form-control" type="text" name="attorney_first_name" id="attorney_first_name">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label-head" for="attorney_last_name">Attorney Last Name</label>
                                                        <input class="form-control" type="text" name="attorney_last_name" id="attorney_last_name">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Option Group Lawsuit End-->

                                        </div>
                                        <!-- Option Group End-->

                                    </div>
                                    <!-- Form tab Contact End-->

                                    <!-- Form tab Optional Items Start-->
                                    <div class="tab-pane" id="optional-items-tab-pane">
                                        <h4 class="mb-4">Optional Items</h4>

                                        <!-- Option Group Start-->
                                        @foreach($services as $service)
                                        <div class="form-check form-switch mb-3 d-flex align-items-start">
                                            <input class="form-check-input optional-check" type="checkbox" name="service{{$service->id}}" id="service{{$service->id}}" nm="{{$service->name}}" value="{{$service->price}}" value="{{$service->description}}">
                                            <label class="form-check-label ms-3" for="service{{$service->id}}">{{$service->name}}</label>

                                            <button type="button" class="btn_help ms-3" data-bs-toggle="modal" data-bs-target="#helpModal"
                                                    data-bs-helpTitle="{{$service->name}}"
                                                    data-bs-helpText="<p>${{$service->price}}</p><p>{{$service->description}}</p>"
                                                  >
                                                <i class="fa fa-question-circle"></i>
                                            </button>
                                        </div>
                                        @endforeach
                                        <!-- Option Group End-->


                                    </div>
                                    <!-- Form tab Contact Start-->

                                    <!-- Form tab Payment Information Start-->
                                    <div class="tab-pane" id="payment-tab-pane">
                                        <h4 class="mb-4">Payment Information</h4>

                                        <!-- Option Group Start-->
                                        <div class="form_group_input mb-5">
                                            <p class="mb-3">We accept all major credit cards.</p>
                                            <div class="credit-card-images">
                                                <img class="me-2 mb-2" alt="Visa" src="{{asset("frontend/images/cc-form-visa.png")}}" height="42"/>
                                                <img class="me-2 mb-2" alt="Mastercard" src="{{asset("frontend/images/cc-form-master.png")}}" height="42"/>
                                                <img class="me-2 mb-2" alt="American Express" src="{{asset("frontend/images/cc-form-amex.png")}}" height="42"/>
                                                <img class="me-2 mb-2" alt="Discover" src="{{asset("frontend/images/cc-form-discover.png")}}" height="42"/>
                                            </div>
                                        </div>
                                        <!-- Option Group End-->

                                        <!-- Option Group Start-->
                                        <div class="form_group_input mb-3">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="form-label-head" for="billing_first_name">Cardholder First Name</label>
                                                    <input class="form-control" type="text" name="billing_first_name" id="billing_first_name">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label-head" for="billing_last_name">Cardholder Last Name</label>
                                                    <input class="form-control" type="text" name="billing_last_name" id="billing_last_name">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Option Group End-->

                                        <!-- Option Group Start-->
                                        <div class="form_group_input mb-3">
                                            <label class="form-label-head" for="card_number required">Card number </label>
                                            <input class="form-control" type="text" name="card_number" id="card_number"  maxlength="21">
                                        </div>
                                        <!-- Option Group End-->

                                        <!-- Option Group Start-->
                                        <div class="form_group_input mb-3">
                                            <div class="row">
                                                <div class="col-8 col-md-6 col-lg-5">
                                                    <label class="form-label-head" for="exp_year">Expiration Date</label>
                                                    <div class="row">
                                                        <div class="col-5 col-md-5 col-lg-4 required">
                                                            <input class="form-control text-center" type="text" name="exp_month" id="exp_month" pattern="0[1-9]|1[0-2]" maxlength="2" placeholder="MM">
                                                        </div>
                                                        <div class="col-7 col-md-7 col-lg-8 required">
                                                            <input class="form-control text-center" type="text" name="exp_year" id="exp_year" pattern="20[1-9][2-9]|20[2-9][0-9]" maxlength="4" placeholder="YYYY">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4 col-md-3 col-lg-2 required">
                                                    <label class="form-label-head" for="cvv">CVV</label>
                                                    <input class="form-control text-center" type="text" name="cvv" id="cvv" pattern="[0-9]{3,4}" maxlength="4">
                                                </div>
                                                <div class="col-md-12 col-lg-5">
                                                    <img class="mt-4" alt="Secure Transaction" src="{{asset("frontend/images/cc-form-ssl-badge.png")}}" height="65"/>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- Option Group End-->
                                        <div class='form-row row'>
                                            <div class='col-md-12 error hide form-group ' >
                                                <div class='alert-danger alert'>Please correct the errors and try
                                                    again.</div>
                                            </div>
                                        </div>


                                    </div>
                                    <!-- Form tab Payment Information End-->

                                </div>
                            </div>
                            <!-- Form tabs content End-->

                            <!-- Form Sidebar Start-->
                            <div class="col-md-5 col-xxl-4">
                                <div class="page_sidebar">
                                    <h4 class="sidebar_title">Order Summary</h4>

                                    <ul class="summary">
                                        <li class="item-breakdown item filing-fee do-not-remove" amt="125">
                                            <span class="line-item">Registered Agent for WY (<span id="company_text">LLC </span>)</span>
                                            <span class="item-cost" >$135.00</span>
                                        </li>



                                    </ul>
                                    <ul style="min-height: 20px !important">
                                        <li class="grand-total">
                                            <span class="line-item">Order Total</span>
                                            <span class="item-cost">$135.00</span>
                                        </li>
                                    </ul>

                                    <button type="button" id="my-button" class="btn_continue">Continue<i class="fa fa-angle-right" aria-hidden="true"></i></button>
									
									<button type="submit" id="my-button" name="myButton" class="btn_done justify-content-center" style="display:none;">DONE</button>
									
									
                                    <span class="terms-p">By clicking done, I accept the <a target="_blank" href="https://llcwyo.com/terms-and-conditions">Terms of Service</a></span>

                                    <div class="sidebar_phone text-center">
                                        <a href="tel:3073173131">Questions? Call 307-317-3131</a>
                                    </div>

                                </div>
                                <div class="sidebar_faqs">
                                    <button type="button" class="btn_help ms-3" data-bs-toggle="modal" data-bs-target="#helpModal"
                                            data-bs-helpTitle="What Happens After I Pay?"
                                            data-bs-helpText="<p>Your order will be processed within 24 hours after payment. Please watch your email for updates on your order</p>">
                                        
                                        <i class="far fa-question-circle"></i> What Happens After I Pay?
                                    </button>

                                    <!-- <button type="button" class="btn_help ms-3" data-bs-toggle="modal" data-bs-target="#helpModal"
                                            data-bs-helpTitle="What If I Want To Cancel?"
                                            data-bs-helpText="<p><strong>For Monthly Corporate Guide Service Clients:</strong></p>
                                        <p>You can cancel anytime; however, when you sign up for our monthly business formation service, you agree to pay us the full amount of your filing costs over 12 months...so when you cancel, we’ll require that you pay us any outstanding fees.</p>
                                        <p><strong>For All Other Clients:</strong></p>
                                        <p>We're extremely fast and efficient. The downside of that is the money that comes in the door goes out just as fast. The state doesn't offer refunds, so we cannot offer refunds on state fees. If you're on the fence about whether you need to form a new company, we recommend you just wait a few days to place the order. Once you place your order, we're instantly off to the races. After you place this order, you'll have a filed company before you know it.</p>">
                                        <i class="far fa-question-circle"></i> What If I Want To Cancel?
                                    </button> -->

                                    <!-- <button type="button" class="btn_help ms-3" data-bs-toggle="modal" data-bs-target="#helpModal"
                                            data-bs-helpTitle="Why Hire Northwest?"
                                            data-bs-helpText="<p>1. Our company is built on speed and efficiency: All orders are processed the same day. Your company will be filed and active before you know it. </p>
                                        <p>2. Seasoned, veteran Corporate Guides: our Corporate Guides are professionals who specialize in your state's filings. And if you have questions after your company is filed and active, you can rest assured you'll be talking to a live pro who knows every aspect of starting and maintaining a business in your state.</p>
                                        <p>3. We include everything you need to take to a bank to open a business bank account:</p>
                                        <ul>
                                            <li>Operating agreement</li>
                                            <li>Resolutions to open a bank account</li>
                                            <li>Membership certificates</li>
                                        </ul>">
                                        <i class="far fa-question-circle"></i> Why Hire Northwest?
                                    </button> -->
                                </div>


                            </div>
                            <!-- Form Sidebar End-->

                        </div>
                    </form>
                    <!-- Form End-->

                </div>

            </div>
        </div>
        <!-- End-->

    </main>
@endsection
@section("scripts")
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

    <script type="text/javascript">
       
       
        $(function() {
            var $form         = $(".require-validation");
            $('form.require-validation').bind('submit', function(e) {
                var $form         = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'].join(', '),
                    $inputs       = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid         = true;
                    $('#my-button').prop('disabled', false);
                // $(':input[type="submit"]').prop('disabled', true);
                $errorMessage.addClass('hide');
               
                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('hide');
                        e.preventDefault();
                    }
                });

                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('#card_number').val(),
                        cvc: $('#cvv').val(),
                        exp_month: $('#exp_month').val(),
                        exp_year: $('#exp_year').val()
                    }, stripeResponseHandler);
                }

            });

            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    // token contains id, last4, and card type
                    var token = response['id'];
                    // insert the token into the form so it gets submitted to the server
                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }

        });
    </script>
    <script !src="">
        $('.entity_select').on('change', function() {
            var corp = $(this).val();
            $("#company_text").html(corp);
        });
        $('.management_type').on('change', function() {
            var type = $(this).val();
            if(type == "Member_Managed"){
                $("#member").show();
                $("#manager").hide();
            }else{
                $("#member").hide();
                $("#manager").show();
            }
        });

        $("body").on("click","div.remove-button",function () {
            var person = parseInt($(this).parent().find(".person-count").html());
            if(person > 1){
                var decrement = person - 1;
                $(this).parent().find(".person-count").html(decrement);
                if (person <= 2){
                    $(this).parent().find(".remove-button").addClass("disabled-add-remove");
                }
                $(this).parent().parent().find(".add-remove-items:last").remove();
            }
        });
        $("body").on("change",".optional-check",function () {
            $(".optional-sumarry").remove();
            var total = parseInt($(".item").attr("amt"));
            $(".optional-check").each(function () {
                var nm = $(this).attr("nm");
                var amount = $(this).val();
                var description = $(this).val();
                if($(this).prop("checked") == true){
                    total = total + parseInt(amount);
                    $(".summary").append("<li amt=\""+amount+"\" class=\"item-breakdown sum optional-sumarry filing-fee do-not-remove\">\n" +
                        "                                            <span class=\"line-item\">"+nm+" </span>\n" +
                        "                                            <span class=\"item-cost\" >$"+amount+".00</span>\n" +
                        "                                        </li>");
                }
            });
            total = total.toFixed(2);

            total  = "$ "+total;
            $(".grand-total").find(".item-cost").html(total);

        });



        $("div.add-button").click(function () {
            var person = parseInt($(this).parent().find(".person-count").html());
            var type_name = $(this).attr("type_name");
            var increment = person + 1;
            $(this).parent().find(".person-count").html(increment);
            $(this).parent().find(".remove-button").removeClass("disabled-add-remove");
            $(this).parent().parent().append("<div class=\"add-remove-items mt-5\">\n" +
                "                                                <div class=\"form_group_input mb-3\">\n" +
                "                                                    <div class=\"row g-2 g-lg-4\">\n" +
                "                                                        <div class=\"col-md-6\">\n" +
                "                                                            <label class=\"form-label-head\" for=\""+type_name+"["+person+"][first_name]\">First Name</label>\n" +
                "                                                            <input class=\"form-control\" type=\"text\" name=\""+type_name+"["+person+"][first_name]\" id=\""+type_name+"["+person+"][first_name]\">\n" +
                "                                                        </div>\n" +
                "                                                        <div class=\"col-md-6\">\n" +
                "                                                            <label class=\"form-label-head\" for=\""+type_name+"["+person+"][last_name]\">Last Name</label>\n" +
                "                                                            <input class=\"form-control\" type=\"text\" name=\""+type_name+"["+person+"][last_name]\" id=\""+type_name+"["+person+"][last_name]\">\n" +
                "                                                        </div>\n" +
                "                                                    </div>\n" +
                "                                                    <div class=\"col-md-12\">\n" +
                "                                                        <label class=\"form-label-head\" for=\""+type_name+"["+person+"][address_selector]\">Address To Record With The State</label>\n" +
                "                                                        <select class=\"form-select person-address-select\" name=\""+type_name+"["+person+"][address_selector]\" id=\""+type_name+"["+person+"][address_selector]\">\n" +
                "                                                            <option value=\"Registered Agent Address\">Our registered agent address</option>\n" +
                "                                                            <option value=\"Specify Address\">Specify address</option>\n" +
                "                                                        </select>\n" +
                "                                                        <textarea class=\"form-control mt-\" name=\""+type_name+"["+person+"][address]\" id=\""+type_name+"_"+person+"_address\" rows=\"6\" style=\"display: none;\"></textarea>\n" +
                "                                                    </div>\n" +
                "                                                </div>\n" +
                "                                            </div>");
        })


        
    </script>


@endsection

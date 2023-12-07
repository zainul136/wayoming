
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>


    <style>
        /* Custom styling for the checkbox */
        .custom-checkbox .form-check-input {
            width: 20px;
            height: 20px;
        }

        .hidden {
            display: none;
        }

        .radio-inline {
            padding: 3px 41px 20px 5px;
        }
    </style>

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader" kt-hidden-height="54" style="">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <!--begin::Page Heading-->
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <!--begin::Page Title-->
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Dashboard</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item text-muted">
                                <a href="" class="text-muted">Manage Client Order</a>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                <a href="" class="text-muted">Edit Client Order</a>
                            </li>
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <!--end::Info-->
            </div>
        </div>
        <!--end::Subheader-->
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Card-->
                <div class="card card-custom card-sticky" id="kt_page_sticky_card">
                    <div class="card-header" style="">
                        <div class="card-title">
                            <h3 class="card-label">Edit Client Order
                                <i class="mr-2"></i>
                            </h3>

                        </div>
                        <div class="card-toolbar">

                        </div>
                    </div>
                    <div class="card-body">
                        <?php echo $__env->make('admin.partials._messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <!--begin::Form-->
                        <?php echo e(Form::open(['route' => 'store.client.orders', 'class' => 'form', 'id' => 'client_add_form', 'enctype' => 'multipart/form-data'])); ?>

                        <?php echo csrf_field(); ?>

                        <input type="hidden" name="order_update_id" value="<?php echo e($edit_client_order->id); ?>">

                        
                        <input type="hidden" name="h_order_update_id" value="<?php echo e($edit_client_order->id); ?>">
                        <input type="hidden" name="h_type_of_business"
                            value="<?php echo e($edit_client_order->type_of_business ?? ''); ?>">
                        <input type="hidden" name="h_company_name" value="<?php echo e($edit_client_order->company_name ?? ''); ?>">
                        <input type="hidden" name="h_first_name" value="<?php echo e($edit_client_order->first_name ?? ''); ?>">
                        <input type="hidden" name="h_last_name" value="<?php echo e($edit_client_order->last_name ?? ''); ?>">
                        <input type="hidden" name="h_email" value="<?php echo e($edit_client_order->email ?? ''); ?>">
                        <input type="hidden" name="h_country" value="<?php echo e($edit_client_order->country ?? ''); ?>">
                        <input type="hidden" name="h_phone_number" value="<?php echo e($edit_client_order->phone_number ?? ''); ?>">
                        <input type="hidden" name="h_mailing_address"
                            value="<?php echo e($edit_client_order->mailing_address ?? ''); ?>">
                        <input type="hidden" name="h_zip_postal_code"
                            value="<?php echo e($edit_client_order->zip_postal_code ?? ''); ?>">
                        <input type="hidden" name="h_city" value="<?php echo e($edit_client_order->city ?? ''); ?>">
                        <input type="hidden" name="h_state_province"
                            value="<?php echo e($edit_client_order->state_province ?? ''); ?>">
                        <input type="hidden" name="h_attorney_first_name"
                            value="<?php echo e($edit_client_order->attorney_first_name ?? ''); ?>">
                        <input type="hidden" name="h_attorney_last_name"
                            value="<?php echo e($edit_client_order->attorney_last_name ?? ''); ?>">
                        <input type="hidden" name="h_attorney_mailing_address"
                            value="<?php echo e($edit_client_order->attorney_mailing_address ?? ''); ?>">
                        <input type="hidden" name="h_attorney" value="<?php echo e($edit_client_order->attorney ?? ''); ?>">





                        <h3>Personal Information</h3>
                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">First Name</label>
                                    <input type="text" name="first_name" value="<?php echo e($edit_client_order->first_name); ?>"
                                        class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Last Name</label>
                                    <input type="text" name="last_name" value="<?php echo e($edit_client_order->last_name); ?>"
                                        class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" name="email" value="<?php echo e($edit_client_order->email); ?>"
                                        class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Country</label>
                                    <select class="form-control" name="country">
                                        <option value="AF"
                                            <?php echo e($edit_client_order->country == 'AF' ? 'selected' : ''); ?>>Afghanistan
                                        </option>
                                        <option value="AX"
                                            <?php echo e($edit_client_order->country == 'AX' ? 'selected' : ''); ?>>Åland</option>
                                        <option value="AL"
                                            <?php echo e($edit_client_order->country == 'AL' ? 'selected' : ''); ?>>Albania</option>
                                        <option value="DZ"
                                            <?php echo e($edit_client_order->country == 'DZ' ? 'selected' : ''); ?>>Algeria</option>
                                        <option value="AS"
                                            <?php echo e($edit_client_order->country == 'AS' ? 'selected' : ''); ?>>American Samoa
                                        </option>
                                        <option value="AD"
                                            <?php echo e($edit_client_order->country == 'AD' ? 'selected' : ''); ?>>Andorra</option>
                                        <option value="AO"
                                            <?php echo e($edit_client_order->country == 'AO' ? 'selected' : ''); ?>>Angola</option>
                                        <option value="AI"
                                            <?php echo e($edit_client_order->country == 'AI' ? 'selected' : ''); ?>>Anguilla</option>
                                        <option value="AQ"
                                            <?php echo e($edit_client_order->country == 'AQ' ? 'selected' : ''); ?>>Antarctica</option>
                                        <option value="AG"
                                            <?php echo e($edit_client_order->country == 'AG' ? 'selected' : ''); ?>>Antigua and Barbuda
                                        </option>
                                        <option value="AR"
                                            <?php echo e($edit_client_order->country == 'AR' ? 'selected' : ''); ?>>Argentina</option>
                                        <option value="AM"
                                            <?php echo e($edit_client_order->country == 'AM' ? 'selected' : ''); ?>>Armenia</option>
                                        <option value="AW"
                                            <?php echo e($edit_client_order->country == 'AW' ? 'selected' : ''); ?>>Aruba</option>
                                        <option value="AU"
                                            <?php echo e($edit_client_order->country == 'AU' ? 'selected' : ''); ?>>Australia</option>
                                        <option value="AT"
                                            <?php echo e($edit_client_order->country == 'AT' ? 'selected' : ''); ?>>Austria</option>
                                        <option value="AZ"
                                            <?php echo e($edit_client_order->country == 'AZ' ? 'selected' : ''); ?>>Azerbaijan</option>
                                        <option value="BS"
                                            <?php echo e($edit_client_order->country == 'BS' ? 'selected' : ''); ?>>Bahamas</option>
                                        <option value="BH"
                                            <?php echo e($edit_client_order->country == 'BH' ? 'selected' : ''); ?>>Bahrain</option>
                                        <option value="BD"
                                            <?php echo e($edit_client_order->country == 'BD' ? 'selected' : ''); ?>>Bangladesh</option>
                                        <option value="BB"
                                            <?php echo e($edit_client_order->country == 'BB' ? 'selected' : ''); ?>>Barbados</option>
                                        <option value="BY"
                                            <?php echo e($edit_client_order->country == 'BY' ? 'selected' : ''); ?>>Belarus</option>
                                        <option value="BE"
                                            <?php echo e($edit_client_order->country == 'BE' ? 'selected' : ''); ?>>Belgium</option>
                                        <option value="BZ"
                                            <?php echo e($edit_client_order->country == 'BZ' ? 'selected' : ''); ?>>Belize</option>
                                        <option value="BJ"
                                            <?php echo e($edit_client_order->country == 'BJ' ? 'selected' : ''); ?>>Benin</option>
                                        <option value="BM"
                                            <?php echo e($edit_client_order->country == 'BM' ? 'selected' : ''); ?>>Bermuda</option>
                                        <option value="BT"
                                            <?php echo e($edit_client_order->country == 'BT' ? 'selected' : ''); ?>>Bhutan</option>
                                        <option value="BO"
                                            <?php echo e($edit_client_order->country == 'BO' ? 'selected' : ''); ?>>Bolivia</option>
                                        <option value="BQ"
                                            <?php echo e($edit_client_order->country == 'BQ' ? 'selected' : ''); ?>>Bonaire</option>
                                        <option value="BA"
                                            <?php echo e($edit_client_order->country == 'BA' ? 'selected' : ''); ?>>Bosnia and
                                            Herzegovina</option>
                                        <option value="BW"
                                            <?php echo e($edit_client_order->country == 'BW' ? 'selected' : ''); ?>>Botswana</option>
                                        <option value="BV"
                                            <?php echo e($edit_client_order->country == 'BV' ? 'selected' : ''); ?>>Bouvet Island
                                        </option>
                                        <option value="BR"
                                            <?php echo e($edit_client_order->country == 'BR' ? 'selected' : ''); ?>>Brazil</option>
                                        <option value="IO"
                                            <?php echo e($edit_client_order->country == 'IO' ? 'selected' : ''); ?>>British Indian
                                            Ocean Territory</option>
                                        <option value="VG"
                                            <?php echo e($edit_client_order->country == 'VG' ? 'selected' : ''); ?>>British Virgin
                                            Islands</option>
                                        <option value="BN"
                                            <?php echo e($edit_client_order->country == 'BN' ? 'selected' : ''); ?>>Brunei</option>
                                        <option value="BG"
                                            <?php echo e($edit_client_order->country == 'BG' ? 'selected' : ''); ?>>Bulgaria</option>
                                        <option value="BF"
                                            <?php echo e($edit_client_order->country == 'BF' ? 'selected' : ''); ?>>Burkina Faso
                                        </option>
                                        <option value="BI"
                                            <?php echo e($edit_client_order->country == 'BI' ? 'selected' : ''); ?>>Burundi</option>
                                        <option value="KH"
                                            <?php echo e($edit_client_order->country == 'KH' ? 'selected' : ''); ?>>Cambodia</option>
                                        <option value="CM"
                                            <?php echo e($edit_client_order->country == 'CM' ? 'selected' : ''); ?>>Cameroon</option>
                                        <option value="CA"
                                            <?php echo e($edit_client_order->country == 'CA' ? 'selected' : ''); ?>>Canada</option>
                                        <option value="CV"
                                            <?php echo e($edit_client_order->country == 'CV' ? 'selected' : ''); ?>>Cape Verde</option>
                                        <option value="KY"
                                            <?php echo e($edit_client_order->country == 'KY' ? 'selected' : ''); ?>>Cayman Islands
                                        </option>
                                        <option value="CF"
                                            <?php echo e($edit_client_order->country == 'CF' ? 'selected' : ''); ?>>Central African
                                            Republic</option>
                                        <option value="TD"
                                            <?php echo e($edit_client_order->country == 'TD' ? 'selected' : ''); ?>>Chad</option>
                                        <option value="CL"
                                            <?php echo e($edit_client_order->country == 'CL' ? 'selected' : ''); ?>>Chile</option>
                                        <option value="CN"
                                            <?php echo e($edit_client_order->country == 'CN' ? 'selected' : ''); ?>>China</option>
                                        <option value="CX"
                                            <?php echo e($edit_client_order->country == 'CX' ? 'selected' : ''); ?>>Christmas Island
                                        </option>
                                        <option value="CC"
                                            <?php echo e($edit_client_order->country == 'CC' ? 'selected' : ''); ?>>Cocos [Keeling]
                                            Islands</option>
                                        <option value="CO"
                                            <?php echo e($edit_client_order->country == 'CO' ? 'selected' : ''); ?>>Colombia</option>
                                        <option value="KM"
                                            <?php echo e($edit_client_order->country == 'KM' ? 'selected' : ''); ?>>Comoros</option>
                                        <option value="CK"
                                            <?php echo e($edit_client_order->country == 'CK' ? 'selected' : ''); ?>>Cook Islands
                                        </option>
                                        <option value="CR"
                                            <?php echo e($edit_client_order->country == 'CR' ? 'selected' : ''); ?>>Costa Rica</option>
                                        <option value="HR"
                                            <?php echo e($edit_client_order->country == 'HR' ? 'selected' : ''); ?>>Croatia</option>
                                        <option value="CU"
                                            <?php echo e($edit_client_order->country == 'CU' ? 'selected' : ''); ?>>Cuba</option>
                                        <option value="CW"
                                            <?php echo e($edit_client_order->country == 'CW' ? 'selected' : ''); ?>>Curacao</option>
                                        <option value="CY"
                                            <?php echo e($edit_client_order->country == 'CY' ? 'selected' : ''); ?>>Cyprus</option>
                                        <option value="CZ"
                                            <?php echo e($edit_client_order->country == 'CZ' ? 'selected' : ''); ?>>Czech Republic
                                        </option>
                                        <option value="CD"
                                            <?php echo e($edit_client_order->country == 'CD' ? 'selected' : ''); ?>>Democratic Republic
                                            of the Congo</option>
                                        <option value="DK"
                                            <?php echo e($edit_client_order->country == 'DK' ? 'selected' : ''); ?>>Denmark</option>
                                        <option value="DJ"
                                            <?php echo e($edit_client_order->country == 'DJ' ? 'selected' : ''); ?>>Djibouti</option>
                                        <option value="DM"
                                            <?php echo e($edit_client_order->country == 'DM' ? 'selected' : ''); ?>>Dominica</option>
                                        <option value="DO"
                                            <?php echo e($edit_client_order->country == 'DO' ? 'selected' : ''); ?>>Dominican Republic
                                        </option>
                                        <option value="TL"
                                            <?php echo e($edit_client_order->country == 'TL' ? 'selected' : ''); ?>>East Timor</option>
                                        <option value="EC"
                                            <?php echo e($edit_client_order->country == 'EC' ? 'selected' : ''); ?>>Ecuador</option>
                                        <option value="EG"
                                            <?php echo e($edit_client_order->country == 'EG' ? 'selected' : ''); ?>>Egypt</option>
                                        <option value="SV"
                                            <?php echo e($edit_client_order->country == 'SV' ? 'selected' : ''); ?>>El Salvador
                                        </option>
                                        <option value="GQ"
                                            <?php echo e($edit_client_order->country == 'GQ' ? 'selected' : ''); ?>>Equatorial Guinea
                                        </option>
                                        <option value="ER"
                                            <?php echo e($edit_client_order->country == 'ER' ? 'selected' : ''); ?>>Eritrea</option>
                                        <option value="EE"
                                            <?php echo e($edit_client_order->country == 'EE' ? 'selected' : ''); ?>>Estonia</option>
                                        <option value="ET"
                                            <?php echo e($edit_client_order->country == 'ET' ? 'selected' : ''); ?>>Ethiopia</option>
                                        <option value="FK"
                                            <?php echo e($edit_client_order->country == 'FK' ? 'selected' : ''); ?>>Falkland Islands
                                        </option>
                                        <option value="FO"
                                            <?php echo e($edit_client_order->country == 'FO' ? 'selected' : ''); ?>>Faroe Islands
                                        </option>
                                        <option value="FJ"
                                            <?php echo e($edit_client_order->country == 'FJ' ? 'selected' : ''); ?>>Fiji</option>
                                        <option value="FI"
                                            <?php echo e($edit_client_order->country == 'FI' ? 'selected' : ''); ?>>Finland</option>
                                        <option value="FR"
                                            <?php echo e($edit_client_order->country == 'FR' ? 'selected' : ''); ?>>France</option>
                                        <option value="GF"
                                            <?php echo e($edit_client_order->country == 'GF' ? 'selected' : ''); ?>>French Guiana
                                        </option>
                                        <option value="PF"
                                            <?php echo e($edit_client_order->country == 'PF' ? 'selected' : ''); ?>>French Polynesia
                                        </option>
                                        <option value="TF"
                                            <?php echo e($edit_client_order->country == 'TF' ? 'selected' : ''); ?>>French Southern
                                            Territories</option>
                                        <option value="GA"
                                            <?php echo e($edit_client_order->country == 'GA' ? 'selected' : ''); ?>>Gabon</option>
                                        <option value="GM"
                                            <?php echo e($edit_client_order->country == 'GM' ? 'selected' : ''); ?>>Gambia</option>

                                        <option value="GE"
                                            <?php echo e($edit_client_order->country == 'GE' ? 'selected' : ''); ?>>Georgia</option>
                                        <option value="DE"
                                            <?php echo e($edit_client_order->country == 'DE' ? 'selected' : ''); ?>>Germany</option>
                                        <option value="GH"
                                            <?php echo e($edit_client_order->country == 'GH' ? 'selected' : ''); ?>>Ghana</option>
                                        <option value="GI"
                                            <?php echo e($edit_client_order->country == 'GI' ? 'selected' : ''); ?>>Gibraltar</option>
                                        <option value="GR"
                                            <?php echo e($edit_client_order->country == 'GR' ? 'selected' : ''); ?>>Greece</option>
                                        <option value="GL"
                                            <?php echo e($edit_client_order->country == 'GL' ? 'selected' : ''); ?>>Greenland</option>
                                        <option value="GD"
                                            <?php echo e($edit_client_order->country == 'GD' ? 'selected' : ''); ?>>Grenada</option>
                                        <option value="GP"
                                            <?php echo e($edit_client_order->country == 'GP' ? 'selected' : ''); ?>>Guadeloupe
                                        </option>
                                        <option value="GU"
                                            <?php echo e($edit_client_order->country == 'GU' ? 'selected' : ''); ?>>Guam</option>
                                        <option value="GT"
                                            <?php echo e($edit_client_order->country == 'GT' ? 'selected' : ''); ?>>Guatemala</option>
                                        <option value="GG"
                                            <?php echo e($edit_client_order->country == 'GG' ? 'selected' : ''); ?>>Guernsey</option>
                                        <option value="GN"
                                            <?php echo e($edit_client_order->country == 'GN' ? 'selected' : ''); ?>>Guinea</option>
                                        <option value="GW"
                                            <?php echo e($edit_client_order->country == 'GW' ? 'selected' : ''); ?>>Guinea-Bissau
                                        </option>
                                        <option value="GY"
                                            <?php echo e($edit_client_order->country == 'GY' ? 'selected' : ''); ?>>Guyana</option>
                                        <option value="HT"
                                            <?php echo e($edit_client_order->country == 'HT' ? 'selected' : ''); ?>>Haiti</option>
                                        <option value="HM"
                                            <?php echo e($edit_client_order->country == 'HM' ? 'selected' : ''); ?>>Heard Island and
                                            McDonald Islands</option>
                                        <option value="HN"
                                            <?php echo e($edit_client_order->country == 'HN' ? 'selected' : ''); ?>>Honduras</option>
                                        <option value="HK"
                                            <?php echo e($edit_client_order->country == 'HK' ? 'selected' : ''); ?>>Hong Kong</option>
                                        <option value="HU"
                                            <?php echo e($edit_client_order->country == 'HU' ? 'selected' : ''); ?>>Hungary</option>
                                        <option value="IS"
                                            <?php echo e($edit_client_order->country == 'IS' ? 'selected' : ''); ?>>Iceland</option>
                                        <option value="IN"
                                            <?php echo e($edit_client_order->country == 'IN' ? 'selected' : ''); ?>>India</option>
                                        <option value="ID"
                                            <?php echo e($edit_client_order->country == 'ID' ? 'selected' : ''); ?>>Indonesia</option>
                                        <option value="IR"
                                            <?php echo e($edit_client_order->country == 'IR' ? 'selected' : ''); ?>>Iran</option>
                                        <option value="IQ"
                                            <?php echo e($edit_client_order->country == 'IQ' ? 'selected' : ''); ?>>Iraq</option>
                                        <option value="IE"
                                            <?php echo e($edit_client_order->country == 'IE' ? 'selected' : ''); ?>>Ireland</option>
                                        <option value="IM"
                                            <?php echo e($edit_client_order->country == 'IM' ? 'selected' : ''); ?>>Isle of Man
                                        </option>
                                        <option value="IL"
                                            <?php echo e($edit_client_order->country == 'IL' ? 'selected' : ''); ?>>Israel</option>
                                        <option value="IT"
                                            <?php echo e($edit_client_order->country == 'IT' ? 'selected' : ''); ?>>Italy</option>
                                        <option value="CI"
                                            <?php echo e($edit_client_order->country == 'CI' ? 'selected' : ''); ?>>Ivory Coast
                                        </option>
                                        <option value="JM"
                                            <?php echo e($edit_client_order->country == 'JM' ? 'selected' : ''); ?>>Jamaica</option>
                                        <option value="JP"
                                            <?php echo e($edit_client_order->country == 'JP' ? 'selected' : ''); ?>>Japan</option>
                                        <option value="JE"
                                            <?php echo e($edit_client_order->country == 'JE' ? 'selected' : ''); ?>>Jersey</option>
                                        <option value="JO"
                                            <?php echo e($edit_client_order->country == 'JO' ? 'selected' : ''); ?>>Jordan</option>
                                        <option value="KZ"
                                            <?php echo e($edit_client_order->country == 'KZ' ? 'selected' : ''); ?>>Kazakhstan
                                        </option>
                                        <option value="KE"
                                            <?php echo e($edit_client_order->country == 'KE' ? 'selected' : ''); ?>>Kenya</option>
                                        <option value="KI"
                                            <?php echo e($edit_client_order->country == 'KI' ? 'selected' : ''); ?>>Kiribati</option>
                                        <option value="XK"
                                            <?php echo e($edit_client_order->country == 'XK' ? 'selected' : ''); ?>>Kosovo</option>
                                        <option value="KW"
                                            <?php echo e($edit_client_order->country == 'KW' ? 'selected' : ''); ?>>Kuwait</option>
                                        <option value="KG"
                                            <?php echo e($edit_client_order->country == 'KG' ? 'selected' : ''); ?>>Kyrgyzstan
                                        </option>
                                        <option value="LA"
                                            <?php echo e($edit_client_order->country == 'LA' ? 'selected' : ''); ?>>Laos</option>
                                        <option value="LV"
                                            <?php echo e($edit_client_order->country == 'LV' ? 'selected' : ''); ?>>Latvia</option>
                                        <option value="LB"
                                            <?php echo e($edit_client_order->country == 'LB' ? 'selected' : ''); ?>>Lebanon</option>
                                        <option value="LS"
                                            <?php echo e($edit_client_order->country == 'LS' ? 'selected' : ''); ?>>Lesotho</option>
                                        <option value="LR"
                                            <?php echo e($edit_client_order->country == 'LR' ? 'selected' : ''); ?>>Liberia</option>
                                        <option value="LY"
                                            <?php echo e($edit_client_order->country == 'LY' ? 'selected' : ''); ?>>Libya</option>
                                        <option value="LI"
                                            <?php echo e($edit_client_order->country == 'LI' ? 'selected' : ''); ?>>Liechtenstein
                                        </option>
                                        <option value="LT"
                                            <?php echo e($edit_client_order->country == 'LT' ? 'selected' : ''); ?>>Lithuania</option>
                                        <option value="LU"
                                            <?php echo e($edit_client_order->country == 'LU' ? 'selected' : ''); ?>>Luxembourg
                                        </option>
                                        <option value="MO"
                                            <?php echo e($edit_client_order->country == 'MO' ? 'selected' : ''); ?>>Macao</option>
                                        <option value="MK"
                                            <?php echo e($edit_client_order->country == 'MK' ? 'selected' : ''); ?>>Macedonia</option>
                                        <option value="MG"
                                            <?php echo e($edit_client_order->country == 'MG' ? 'selected' : ''); ?>>Madagascar
                                        </option>
                                        <option value="MW"
                                            <?php echo e($edit_client_order->country == 'MW' ? 'selected' : ''); ?>>Malawi</option>
                                        <option value="MY"
                                            <?php echo e($edit_client_order->country == 'MY' ? 'selected' : ''); ?>>Malaysia</option>
                                        <option value="MV"
                                            <?php echo e($edit_client_order->country == 'MV' ? 'selected' : ''); ?>>Maldives</option>
                                        <option value="ML"
                                            <?php echo e($edit_client_order->country == 'ML' ? 'selected' : ''); ?>>Mali</option>
                                        <option value="MT"
                                            <?php echo e($edit_client_order->country == 'MT' ? 'selected' : ''); ?>>Malta</option>
                                        <option value="MH"
                                            <?php echo e($edit_client_order->country == 'MH' ? 'selected' : ''); ?>>Marshall Islands
                                        </option>
                                        <option value="MQ"
                                            <?php echo e($edit_client_order->country == 'MQ' ? 'selected' : ''); ?>>Martinique
                                        </option>
                                        <option value="MR"
                                            <?php echo e($edit_client_order->country == 'MR' ? 'selected' : ''); ?>>Mauritania
                                        </option>
                                        <option value="MU"
                                            <?php echo e($edit_client_order->country == 'MU' ? 'selected' : ''); ?>>Mauritius</option>
                                        <option value="YT"
                                            <?php echo e($edit_client_order->country == 'YT' ? 'selected' : ''); ?>>Mayotte</option>
                                        <option value="MX"
                                            <?php echo e($edit_client_order->country == 'MX' ? 'selected' : ''); ?>>Mexico</option>
                                        <option value="FM"
                                            <?php echo e($edit_client_order->country == 'FM' ? 'selected' : ''); ?>>Micronesia
                                        </option>
                                        <option value="MD"
                                            <?php echo e($edit_client_order->country == 'MD' ? 'selected' : ''); ?>>Moldova</option>
                                        <option value="MC"
                                            <?php echo e($edit_client_order->country == 'MC' ? 'selected' : ''); ?>>Monaco</option>
                                        <option value="MN"
                                            <?php echo e($edit_client_order->country == 'MN' ? 'selected' : ''); ?>>Mongolia</option>
                                        <option value="ME"
                                            <?php echo e($edit_client_order->country == 'ME' ? 'selected' : ''); ?>>Montenegro
                                        </option>
                                        <option value="MS"
                                            <?php echo e($edit_client_order->country == 'MS' ? 'selected' : ''); ?>>Montserrat
                                        </option>
                                        <option value="MA"
                                            <?php echo e($edit_client_order->country == 'MA' ? 'selected' : ''); ?>>Morocco</option>
                                        <option value="MZ"
                                            <?php echo e($edit_client_order->country == 'MZ' ? 'selected' : ''); ?>>Mozambique
                                        </option>
                                        <option value="MM"
                                            <?php echo e($edit_client_order->country == 'MM' ? 'selected' : ''); ?>>Myanmar [Burma]
                                        </option>
                                        <option value="NA"
                                            <?php echo e($edit_client_order->country == 'NA' ? 'selected' : ''); ?>>Namibia</option>
                                        <option value="NR"
                                            <?php echo e($edit_client_order->country == 'NR' ? 'selected' : ''); ?>>Nauru</option>
                                        <option value="NP"
                                            <?php echo e($edit_client_order->country == 'NP' ? 'selected' : ''); ?>>Nepal</option>
                                        <option value="NL"
                                            <?php echo e($edit_client_order->country == 'NL' ? 'selected' : ''); ?>>Netherlands
                                        </option>
                                        <option value="NC"
                                            <?php echo e($edit_client_order->country == 'NC' ? 'selected' : ''); ?>>New Caledonia
                                        </option>
                                        <option value="NZ"
                                            <?php echo e($edit_client_order->country == 'NZ' ? 'selected' : ''); ?>>New Zealand
                                        </option>
                                        <option value="NI"
                                            <?php echo e($edit_client_order->country == 'NI' ? 'selected' : ''); ?>>Nicaragua</option>
                                        <option value="NE"
                                            <?php echo e($edit_client_order->country == 'NE' ? 'selected' : ''); ?>>Niger</option>
                                        <option value="NG"
                                            <?php echo e($edit_client_order->country == 'NG' ? 'selected' : ''); ?>>Nigeria</option>
                                        <option value="NU"
                                            <?php echo e($edit_client_order->country == 'NU' ? 'selected' : ''); ?>>Niue</option>
                                        <option value="NF"
                                            <?php echo e($edit_client_order->country == 'NF' ? 'selected' : ''); ?>>Norfolk Island
                                        </option>
                                        <option value="KP"
                                            <?php echo e($edit_client_order->country == 'KP' ? 'selected' : ''); ?>>North Korea
                                        </option>
                                        <option value="MP"
                                            <?php echo e($edit_client_order->country == 'MP' ? 'selected' : ''); ?>>Northern Mariana
                                            Islands</option>
                                        <option value="NO"
                                            <?php echo e($edit_client_order->country == 'NO' ? 'selected' : ''); ?>>Norway</option>
                                        <option value="OM"
                                            <?php echo e($edit_client_order->country == 'OM' ? 'selected' : ''); ?>>Oman</option>
                                        <option value="PK"
                                            <?php echo e($edit_client_order->country == 'PK' ? 'selected' : ''); ?>>Pakistan</option>
                                        <option value="PW"
                                            <?php echo e($edit_client_order->country == 'PW' ? 'selected' : ''); ?>>Palau</option>
                                        <option value="PS"
                                            <?php echo e($edit_client_order->country == 'PS' ? 'selected' : ''); ?>>Palestine</option>
                                        <option value="PA"
                                            <?php echo e($edit_client_order->country == 'PA' ? 'selected' : ''); ?>>Panama</option>
                                        <option value="PG"
                                            <?php echo e($edit_client_order->country == 'PG' ? 'selected' : ''); ?>>Papua New Guinea
                                        </option>
                                        <option value="PY"
                                            <?php echo e($edit_client_order->country == 'PY' ? 'selected' : ''); ?>>Paraguay</option>
                                        <option value="PE"
                                            <?php echo e($edit_client_order->country == 'PE' ? 'selected' : ''); ?>>Peru</option>
                                        <option value="PH"
                                            <?php echo e($edit_client_order->country == 'PH' ? 'selected' : ''); ?>>Philippines
                                        </option>
                                        <option value="PN"
                                            <?php echo e($edit_client_order->country == 'PN' ? 'selected' : ''); ?>>Pitcairn Islands
                                        </option>
                                        <option value="PL"
                                            <?php echo e($edit_client_order->country == 'PL' ? 'selected' : ''); ?>>Poland</option>
                                        <option value="PT"
                                            <?php echo e($edit_client_order->country == 'PT' ? 'selected' : ''); ?>>Portugal</option>
                                        <option value="PR"
                                            <?php echo e($edit_client_order->country == 'PR' ? 'selected' : ''); ?>>Puerto Rico
                                        </option>
                                        <option value="QA"
                                            <?php echo e($edit_client_order->country == 'QA' ? 'selected' : ''); ?>>Qatar</option>
                                        <option value="CG"
                                            <?php echo e($edit_client_order->country == 'CG' ? 'selected' : ''); ?>>Republic of the
                                            Congo</option>
                                        <option value="RE"
                                            <?php echo e($edit_client_order->country == 'RE' ? 'selected' : ''); ?>>Réunion</option>
                                        <option value="RO"
                                            <?php echo e($edit_client_order->country == 'RO' ? 'selected' : ''); ?>>Romania</option>
                                        <option value="RU"
                                            <?php echo e($edit_client_order->country == 'RU' ? 'selected' : ''); ?>>Russia</option>
                                        <option value="RW"
                                            <?php echo e($edit_client_order->country == 'RW' ? 'selected' : ''); ?>>Rwanda</option>
                                        <option value="BL"
                                            <?php echo e($edit_client_order->country == 'BL' ? 'selected' : ''); ?>>Saint Barthélemy
                                        </option>
                                        <option value="SH"
                                            <?php echo e($edit_client_order->country == 'SH' ? 'selected' : ''); ?>>Saint Helena
                                        </option>
                                        <option value="KN"
                                            <?php echo e($edit_client_order->country == 'KN' ? 'selected' : ''); ?>>Saint Kitts and
                                            Nevis</option>
                                        <option value="LC"
                                            <?php echo e($edit_client_order->country == 'LC' ? 'selected' : ''); ?>>Saint Lucia
                                        </option>
                                        <option value="MF"
                                            <?php echo e($edit_client_order->country == 'MF' ? 'selected' : ''); ?>>Saint Martin
                                        </option>
                                        <option value="PM"
                                            <?php echo e($edit_client_order->country == 'PM' ? 'selected' : ''); ?>>Saint Pierre and
                                            Miquelon</option>
                                        <option value="VC"
                                            <?php echo e($edit_client_order->country == 'VC' ? 'selected' : ''); ?>>Saint Vincent and
                                            the Grenadines</option>
                                        <option value="WS"
                                            <?php echo e($edit_client_order->country == 'WS' ? 'selected' : ''); ?>>Samoa</option>
                                        <option value="SM"
                                            <?php echo e($edit_client_order->country == 'SM' ? 'selected' : ''); ?>>San Marino
                                        </option>
                                        <option value="ST"
                                            <?php echo e($edit_client_order->country == 'ST' ? 'selected' : ''); ?>>São Tomé and
                                            Príncipe</option>
                                        <option value="SA"
                                            <?php echo e($edit_client_order->country == 'SA' ? 'selected' : ''); ?>>Saudi Arabia
                                        </option>
                                        <option value="SN"
                                            <?php echo e($edit_client_order->country == 'SN' ? 'selected' : ''); ?>>Senegal</option>
                                        <option value="RS"
                                            <?php echo e($edit_client_order->country == 'RS' ? 'selected' : ''); ?>>Serbia</option>
                                        <option value="SC"
                                            <?php echo e($edit_client_order->country == 'SC' ? 'selected' : ''); ?>>Seychelles
                                        </option>
                                        <option value="SL"
                                            <?php echo e($edit_client_order->country == 'SL' ? 'selected' : ''); ?>>Sierra Leone
                                        </option>
                                        <option value="SG"
                                            <?php echo e($edit_client_order->country == 'SG' ? 'selected' : ''); ?>>Singapore</option>
                                        <option value="SX"
                                            <?php echo e($edit_client_order->country == 'SX' ? 'selected' : ''); ?>>Sint Maarten
                                        </option>
                                        <option value="SK"
                                            <?php echo e($edit_client_order->country == 'SK' ? 'selected' : ''); ?>>Slovakia</option>
                                        <option value="SI"
                                            <?php echo e($edit_client_order->country == 'SI' ? 'selected' : ''); ?>>Slovenia</option>
                                        <option value="SB"
                                            <?php echo e($edit_client_order->country == 'SB' ? 'selected' : ''); ?>>Solomon Islands
                                        </option>
                                        <option value="SO"
                                            <?php echo e($edit_client_order->country == 'SO' ? 'selected' : ''); ?>>Somalia</option>
                                        <option value="ZA"
                                            <?php echo e($edit_client_order->country == 'ZA' ? 'selected' : ''); ?>>South Africa
                                        </option>
                                        <option value="GS"
                                            <?php echo e($edit_client_order->country == 'GS' ? 'selected' : ''); ?>>South Georgia and
                                            the South Sandwich Islands</option>
                                        <option value="KR"
                                            <?php echo e($edit_client_order->country == 'KR' ? 'selected' : ''); ?>>South Korea
                                        </option>
                                        <option value="SS"
                                            <?php echo e($edit_client_order->country == 'SS' ? 'selected' : ''); ?>>South Sudan
                                        </option>
                                        <option value="ES"
                                            <?php echo e($edit_client_order->country == 'ES' ? 'selected' : ''); ?>>Spain</option>
                                        <option value="LK"
                                            <?php echo e($edit_client_order->country == 'LK' ? 'selected' : ''); ?>>Sri Lanka</option>
                                        <option value="SD"
                                            <?php echo e($edit_client_order->country == 'SD' ? 'selected' : ''); ?>>Sudan</option>
                                        <option value="SR"
                                            <?php echo e($edit_client_order->country == 'SR' ? 'selected' : ''); ?>>Suriname</option>
                                        <option value="SJ"
                                            <?php echo e($edit_client_order->country == 'SJ' ? 'selected' : ''); ?>>Svalbard and Jan
                                            Mayen</option>
                                        <option value="SZ"
                                            <?php echo e($edit_client_order->country == 'SZ' ? 'selected' : ''); ?>>Swaziland</option>
                                        <option value="SE"
                                            <?php echo e($edit_client_order->country == 'SE' ? 'selected' : ''); ?>>Sweden</option>
                                        <option value="CH"
                                            <?php echo e($edit_client_order->country == 'CH' ? 'selected' : ''); ?>>Switzerland
                                        </option>
                                        <option value="SY"
                                            <?php echo e($edit_client_order->country == 'SY' ? 'selected' : ''); ?>>Syria</option>
                                        <option value="TW"
                                            <?php echo e($edit_client_order->country == 'TW' ? 'selected' : ''); ?>>Taiwan</option>
                                        <option value="TJ"
                                            <?php echo e($edit_client_order->country == 'TJ' ? 'selected' : ''); ?>>Tajikistan
                                        </option>
                                        <option value="TZ"
                                            <?php echo e($edit_client_order->country == 'TZ' ? 'selected' : ''); ?>>Tanzania</option>
                                        <option value="TH"
                                            <?php echo e($edit_client_order->country == 'TH' ? 'selected' : ''); ?>>Thailand</option>
                                        <option value="TG"
                                            <?php echo e($edit_client_order->country == 'TG' ? 'selected' : ''); ?>>Togo</option>
                                        <option value="TK"
                                            <?php echo e($edit_client_order->country == 'TK' ? 'selected' : ''); ?>>Tokelau</option>
                                        <option value="TO"
                                            <?php echo e($edit_client_order->country == 'TO' ? 'selected' : ''); ?>>Tonga</option>
                                        <option value="TT"
                                            <?php echo e($edit_client_order->country == 'TT' ? 'selected' : ''); ?>>Trinidad and
                                            Tobago</option>
                                        <option value="TN"
                                            <?php echo e($edit_client_order->country == 'TN' ? 'selected' : ''); ?>>Tunisia</option>
                                        <option value="TR"
                                            <?php echo e($edit_client_order->country == 'TR' ? 'selected' : ''); ?>>Turkey</option>
                                        <option value="TM"
                                            <?php echo e($edit_client_order->country == 'TM' ? 'selected' : ''); ?>>Turkmenistan
                                        </option>
                                        <option value="TC"
                                            <?php echo e($edit_client_order->country == 'TC' ? 'selected' : ''); ?>>Turks and Caicos
                                            Islands</option>
                                        <option value="TV"
                                            <?php echo e($edit_client_order->country == 'TV' ? 'selected' : ''); ?>>Tuvalu</option>
                                        <option value="UM"
                                            <?php echo e($edit_client_order->country == 'UM' ? 'selected' : ''); ?>>U.S. Minor
                                            Outlying Islands</option>
                                        <option value="VI"
                                            <?php echo e($edit_client_order->country == 'VI' ? 'selected' : ''); ?>>U.S. Virgin
                                            Islands</option>
                                        <option value="UG"
                                            <?php echo e($edit_client_order->country == 'UG' ? 'selected' : ''); ?>>Uganda</option>
                                        <option value="UA"
                                            <?php echo e($edit_client_order->country == 'UA' ? 'selected' : ''); ?>>Ukraine</option>
                                        <option value="AE"
                                            <?php echo e($edit_client_order->country == 'AE' ? 'selected' : ''); ?>>United Arab
                                            Emirates</option>
                                        <option value="GB"
                                            <?php echo e($edit_client_order->country == 'GB' ? 'selected' : ''); ?>>United Kingdom
                                        </option>
                                        <option value="US"
                                            <?php echo e($edit_client_order->country == 'US' ? 'selected' : ''); ?>>United States
                                        </option>
                                        <option value="UY"
                                            <?php echo e($edit_client_order->country == 'UY' ? 'selected' : ''); ?>>Uruguay</option>
                                        <option value="UZ"
                                            <?php echo e($edit_client_order->country == 'UZ' ? 'selected' : ''); ?>>Uzbekistan
                                        </option>
                                        <option value="VU"
                                            <?php echo e($edit_client_order->country == 'VU' ? 'selected' : ''); ?>>Vanuatu</option>
                                        <option value="VA"
                                            <?php echo e($edit_client_order->country == 'VA' ? 'selected' : ''); ?>>Vatican City
                                        </option>
                                        <option value="VE"
                                            <?php echo e($edit_client_order->country == 'VE' ? 'selected' : ''); ?>>Venezuela</option>
                                        <option value="VN"
                                            <?php echo e($edit_client_order->country == 'VN' ? 'selected' : ''); ?>>Vietnam</option>
                                        <option value="WF"
                                            <?php echo e($edit_client_order->country == 'WF' ? 'selected' : ''); ?>>Wallis and Futuna
                                        </option>
                                        <option value="EH"
                                            <?php echo e($edit_client_order->country == 'EH' ? 'selected' : ''); ?>>Western Sahara
                                        </option>
                                        <option value="YE"
                                            <?php echo e($edit_client_order->country == 'YE' ? 'selected' : ''); ?>>Yemen</option>
                                        <option value="ZM"
                                            <?php echo e($edit_client_order->country == 'ZM' ? 'selected' : ''); ?>>Zambia</option>
                                        <option value="ZW"
                                            <?php echo e($edit_client_order->country == 'ZW' ? 'selected' : ''); ?>>Zimbabwe</option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Phone Number</label>
                                    <input type="text" name="phone_number"
                                        value="<?php echo e($edit_client_order->phone_number); ?>" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Mailing Address</label>
                                    <input type="text" name="mailing_address"
                                        value="<?php echo e($edit_client_order->mailing_address); ?>" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Zip Code</label>
                                    <input type="text" name="zip_postal_code"
                                        value="<?php echo e($edit_client_order->zip_postal_code); ?>" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">City</label>
                                    <input type="text" name="city" value="<?php echo e($edit_client_order->city); ?>"
                                        class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Province</label>
                                    <input type="text" name="state_province"
                                        value="<?php echo e($edit_client_order->state_province); ?>" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4"></div>
                            <div class="col-md-4"></div>


                        </div>

                        <h3 class="mb-4" style="margin-top: 30px;">Company Detail</h3>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Company Name</label>
                                    <input type="text" name="company_name"
                                        value="<?php echo e($edit_client_order->company_name); ?>" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Type Of Business</label>
                                    <input type="text" name="type_of_business"
                                        value="<?php echo e($edit_client_order->type_of_business); ?>" class="form-control"
                                        readonly>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Order Type</label>
                                    <select name="order_type" class="form-control" disabled>
                                        <option value="0"
                                            <?php echo e($edit_client_order->order_type == 0 ? 'selected' : ''); ?>>Form a New Company
                                        </option>
                                        <option value="1"
                                            <?php echo e($edit_client_order->order_type == 1 ? 'selected' : ''); ?>>Registered Agent
                                        </option>
                                        <option value="2"
                                            <?php echo e($edit_client_order->order_type == 2 ? 'selected' : ''); ?>>Renewal</option>
                                    </select>
                                    <input type="hidden" name="order_type_hidden" value="<?php echo e($edit_client_order->order_type); ?>">
                                </div>
                            </div>

                        </div>


                        <?php if(count($edit_client_order->sharetypes) > 0 || count($edit_client_order->compmanagment) > 0): ?>

                            <h3 class="mb-4" style="margin-top: 20px;">Company Management</h3>
                            
                            <?php $__currentLoopData = $edit_client_order->compmanagment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $compmanag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <input type="hidden" name="<?php echo e($compmanag->type); ?>[0][comp_m_id]"
                                    value="<?php echo e($compmanag->id); ?>">

                                <label for="" style="font-weight: bold"><?php echo e($compmanag->type); ?></label>
                                <div class="row <?php echo e($compmanag->type); ?>">

                                    <input type="hidden" name="comptype" value="<?php echo e($compmanag->type); ?>">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">First Name</label>
                                            <input type="text" name="<?php echo e($compmanag->type); ?>[0][first_name]"
                                                value="<?php echo e($compmanag->first_name); ?>" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Last Name</label>
                                            <input type="text" name="<?php echo e($compmanag->type); ?>[0][last_name]"
                                                value="<?php echo e($compmanag->last_name); ?>" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Address</label>

                                            <select name="<?php echo e($compmanag->type); ?>[0][address_selector]"
                                                class="form-control presidentDropdwon">
                                                <option value="default"
                                                    <?php echo e($compmanag->address == 'default' ? 'selected' : ''); ?>>Our
                                                    Registered Agent Address</option>
                                                <option value="specifics"
                                                    <?php echo e($compmanag->address != 'default' ? 'selected' : ''); ?>>Specify
                                                    Address</option>
                                            </select>

                                            <input type="text" name="<?php echo e($compmanag->type); ?>[0][address_corp]" hidden
                                                class="address_corp form-control" placeholder="Your Address here..."
                                                style="border-radius: 0 0 .4rem .4rem;"
                                                value="<?php echo e($compmanag->address); ?>">

                                        </div>
                                    </div>

                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            




                            
                            <?php if(count($edit_client_order->sharetypes) > 0): ?>
                                <h4 style="margin-top: 10px; margin-bottom: 15px;">Share Type</h4>
                                <div class="d-flex">
                                    <label class="radio-inline" onclick="SelectServiceForShare(this, 'common-share')" style="display: none;">
                                        <input type="radio" class="mr-3" name="share_type" value="common">Common
                                        Share
                                    </label>
                                    <label class="radio-inline" onclick="SelectServiceForShare(this, 'preferred-share')" style="display: none;">
                                        <input type="radio" class="mr-3" name="share_type"
                                            value="preferred">Preferred
                                        Shares
                                    </label>
                                    <label class="radio-inline" onclick="SelectServiceForShare(this, 'both-share')" style="display: none;">
                                        <input type="radio" class="mr-3" name="share_type" checked
                                            value="both">Both
                                        Common and
                                        Preferred
                                    </label>
                                </div>
                            <?php endif; ?>

                            <?php $__currentLoopData = $edit_client_order->sharetypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $share): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div id="<?php echo e($share->type); ?>" style="display: none;">
                                    <input type="hidden" name="<?php echo e($share->type); ?>[0][share_type_id]"
                                        value="<?php echo e($share->id); ?>">
                                    <h5 style="margin-top: 10px; margin-bottom: 15px;"><?php echo e($share->type); ?> Share</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">Number <?php echo e($share->type); ?> Shares</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control"
                                                    name="<?php echo e($share->type); ?>[0][share_number]"
                                                    value="<?php echo e($share->share_number); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Par Value <?php echo e($share->type); ?> Share</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control"
                                                    name="<?php echo e($share->type); ?>[0][share_value]"
                                                    value="<?php echo e($share->share_value); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            

                        <?php endif; ?>

                        <?php if(count($edit_client_order->managements) > 0): ?>
                            

                            <?php if($edit_client_order->type_of_business == 'LLC'): ?>
                                <h4 style="margin-top: 10px; margin-bottom: 15px;">
                                    <?php echo e(ucfirst($edit_client_order->omcheckbox->type)); ?></h4>

                                <button type="button" class="btn btn-primary btn-sm btn_add_row mb-3" style="background: #557D60 !important;
                                color: white !important; border: 0px;">Add
                                    <?php echo e(ucfirst($edit_client_order->omcheckbox->type)); ?></button>

                                    <input type="hidden" name="key"
                                    value="<?php echo e($edit_client_order->managements->count()); ?>"
                                    data-key="<?php echo e($edit_client_order->managements->count()); ?>">

                                <div class="d-flex" id="memberManagerDiv">
                                    <label class="radio-inline" style="display: none;">
                                        <input type="radio" class="mr-3" name="management_type"
                                            value="Member_Managed"
                                            <?php echo e(($edit_client_order->omcheckbox->type ?? '') == 'member' ? 'checked' : ''); ?>>Member
                                    </label>
                                    <label class="radio-inline" style="display: none;">
                                        <input type="radio" class="mr-3" name="management_type"
                                            value="Manager_Managed"
                                            <?php echo e(($edit_client_order->omcheckbox->type ?? '') == 'manager' ? 'checked' : ''); ?>>Manager
                                    </label>
                                </div>
                            <?php else: ?>
                                <h4 style="margin-top: 10px; margin-bottom: 15px;">Director(S)</h4>
                                <button type="button" class="btn btn-primary btn-sm btn_add_row mb-3" style="background: #557D60 !important;
                                color: white !important; border: 0px;">Add
                                    <?php echo e(ucfirst($edit_client_order->omcheckbox->type)); ?></button>
                                <input type="hidden" name="key"
                                    value="<?php echo e($edit_client_order->managements->count()); ?>"
                                    data-key="<?php echo e($edit_client_order->managements->count()); ?>">
                            <?php endif; ?>

                            <?php $__currentLoopData = $edit_client_order->managements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $manage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($manage->type == 'director'): ?>
                                    <table>
                                        <tbody class="directorTable">
                                            <tr>
                                                <td>
                                                    <label for="">First Name</label>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control"
                                                            name="<?php echo e($manage->type); ?>[<?php echo e($key); ?>][first_name]"
                                                            value="<?php echo e($manage->first_name); ?>">
                                                    </div>
                                                </td>
                                                <td>
                                                    <label for="">Last Name</label>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control"
                                                            name="<?php echo e($manage->type); ?>[<?php echo e($key); ?>][last_name]"
                                                            value="<?php echo e($manage->last_name); ?>">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="">Address To Record With The State</label>

                                                        <select
                                                            name="<?php echo e($manage->type); ?>[<?php echo e($key); ?>][address_selector]"
                                                            class="form-control addres_appended">
                                                            <option value="default"
                                                                <?php echo e($manage->address_to_record_with_state == 'default' ? 'selected' : ''); ?>>
                                                                Our Registered Agent Address</option>
                                                            <option value="specifics"
                                                                <?php echo e($manage->address_to_record_with_state != 'default' ? 'selected' : ''); ?>>
                                                                Specify Address</option>
                                                        </select>

                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="text"
                                                        name="<?php echo e($manage->type); ?>[<?php echo e($key); ?>][address]"
                                                        class="address_direc form-control"
                                                        placeholder="Your Address here..." style="display: none;"
                                                        value="<?php echo e($manage->address_to_record_with_state); ?>">
                                                </td>
                                            </tr>


                                        </tbody>
                                    </table>
                                <?php else: ?>
                                    <table>
                                        <tbody class="member_or_manager_table">
                                            <tr>
                                                <td>
                                                    <label for="">First Name</label>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control"
                                                            name="<?php echo e($manage->type); ?>[<?php echo e($key); ?>][first_name]"
                                                            value="<?php echo e($manage->first_name); ?>">
                                                    </div>
                                                </td>
                                                <td>
                                                    <label for="">Last Name</label>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control"
                                                            name="<?php echo e($manage->type); ?>[<?php echo e($key); ?>][last_name]"
                                                            value="<?php echo e($manage->last_name); ?>">
                                                    </div>
                                                </td>
                                                <td>
                                                    <select
                                                        name="<?php echo e($manage->type); ?>[<?php echo e($key); ?>][address_selector]"
                                                        class="form-control addres_appended_member">
                                                        <option value="default"
                                                            <?php echo e($manage->address_to_record_with_state == 'default' ? 'selected' : ''); ?>>
                                                            Our Registered Agent Address</option>
                                                        <option value="specifics"
                                                            <?php echo e($manage->address_to_record_with_state != 'default' ? 'selected' : ''); ?>>
                                                            Specify Address</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="text"
                                                        name="<?php echo e($manage->type); ?>[<?php echo e($key); ?>][address]"
                                                        class="address_mem form-control"
                                                        placeholder="Your Address here..." style="display: none;"
                                                        value="<?php echo e($manage->address_to_record_with_state); ?>">
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                    
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <table id="mmTable">
                                <tbody class="addNewMemManag">

                                </tbody>
                            </table>

                            

                        <?php endif; ?>


                        <?php if($edit_client_order->agentrenewal): ?>
                            <h4>Enter Assets Located In Wyoming</h4>
                            <div class="row mb-3 company">
                                <div class="col-md-3">
                                    <label for="">Cash</label>
                                    <input type="number" name="cash" id="cash" class="form-control"
                                        value="<?php echo e($edit_client_order->agentrenewal->cash); ?>" placeholder="Cash">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Trade Notes & Accounts Receivable</label>
                                    <input type="number" name="tradeNotesInput" id="tradeNotesInput"
                                        value="<?php echo e($edit_client_order->agentrenewal->tradeNotesInput); ?>"
                                        class="form-control" placeholder="$0">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Subtract Allowance For Bad Debts</label>
                                    <input type="number" id="allowanceInput" name="allowanceInput" class="form-control"
                                        value="<?php echo e($edit_client_order->agentrenewal->allowanceInput); ?>" placeholder="$0">
                                </div>
                                <div class="col-md-3">
                                    <label for="">(Accounts Receivable - Bed Debts)</label>
                                    <input type="text" id="accountsReceivable" name="accountsReceivable"
                                        class="form-control" placeholder="$0"
                                        value="<?php echo e($edit_client_order->agentrenewal->accountsReceivable); ?>" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label for="">U.S Government Obligations</label>
                                    <input type="number" id="governmentObligations" name="governmentObligations"
                                        class="form-control"
                                        value="<?php echo e($edit_client_order->agentrenewal->governmentObligations); ?>"
                                        placeholder="$0">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Tax-Exempt Securities</label>
                                    <input type="text" id="securities" name="securities" class="form-control"
                                        placeholder="$0" value="<?php echo e($edit_client_order->agentrenewal->securities); ?>">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Other Current Assets</label>
                                    <input type="number" id="currentAssets" name="currentAssets" class="form-control"
                                        value="<?php echo e($edit_client_order->agentrenewal->currentAssets); ?>" placeholder="$0">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Loans to Stockholders</label>
                                    <input type="number" id="loans" name="loans" class="form-control"
                                        value="<?php echo e($edit_client_order->agentrenewal->loans); ?>" placeholder="$0">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Mortgage & Real Estate Loans</label>
                                    <input type="number" id="mortgage" name="mortgage" class="form-control"
                                        value="<?php echo e($edit_client_order->agentrenewal->mortgage ?? ''); ?>" placeholder="$0">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Other Investments</label>
                                    <input type="number" id="otherInvestments" name="otherInvestments"
                                        class="form-control"
                                        value="<?php echo e($edit_client_order->agentrenewal->otherInvestments ?? ''); ?>"
                                        placeholder="$0">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Buildings & Other Depreciable Tangible Assets</label>
                                    <input type="number" id="buildings" name="buildings" class="form-control"
                                        value="<?php echo e($edit_client_order->agentrenewal->buildings ?? ''); ?>"
                                        placeholder="$0">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Depietable Assets</label>
                                    <input type="number" id="depietableAssets" name="depietableAssets"
                                        class="form-control"
                                        value="<?php echo e($edit_client_order->agentrenewal->depietableAssets ?? ''); ?>"
                                        placeholder="$0">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Land</label>
                                    <input type="number" id="land" name="land" class="form-control"
                                        value="<?php echo e($edit_client_order->agentrenewal->land ?? ''); ?>" placeholder="$0">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Intangible Assets</label>
                                    <input type="number" id="intangibleAssets" name="intangibleAssets"
                                        class="form-control"
                                        value="<?php echo e($edit_client_order->agentrenewal->intangibleAssets ?? ''); ?>"
                                        placeholder="$0">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Accumulated Amortization</label>
                                    <input type="number" id="accumulatedAmortization" name="accumulatedAmortization"
                                        class="form-control"
                                        value="<?php echo e($edit_client_order->agentrenewal->accumulatedAmortization ?? ''); ?>"
                                        placeholder="$0">
                                </div>
                                <div class="col-md-3">
                                    <label for="">(Intangible Assets - Accumulated Amortization)</label>
                                    <input type="text" id="intangibleAmortization" name="intangibleAmortization"
                                        class="form-control" data=""
                                        value="<?php echo e($edit_client_order->agentrenewal->intangibleAmortization ?? ''); ?>"
                                        placeholder="$0" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Other Assets</label>
                                    <input type="number" id="otherAssets" name="otherAssets" class="form-control"
                                        value="<?php echo e($edit_client_order->agentrenewal->otherAssets ?? ''); ?>"
                                        placeholder="$0">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Total Assets Value For Computing Tax</label>
                                    <input type="text" id="totalAssetsValue" name="totalAssetsValue"
                                        class="form-control"
                                        value="<?php echo e($edit_client_order->agentrenewal->totalAssetsValue ?? ''); ?>"
                                        placeholder="$0" readonly>
                                </div>
                            </div>
                        <?php endif; ?>


                        <button type="submit" class="btn btn-default pull-right"
                            style="background: #557D60; color: white;">Save Changes</button>
                        <?php echo e(Form::close()); ?>

                        <!--end::Form-->
                    </div>
                </div>
                <!--end::Card-->

            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>


    <script>
        // const AddressPresident = (e, parent) => {
        //     const address = document.querySelector(`.${parent} .address_corp`)
        //     if (e.value == "specifics") {
        //         address.removeAttribute("hidden", "")
        //         e.style.borderRadius = ".4rem .4rem 0 0"
        //     } else {
        //         address.setAttribute("hidden", "")
        //         e.style.borderRadius = ".4rem"
        //     }
        // }


        $('#common').show();
        $('#preferred').show();

        const SelectServiceForShare = (e, value) => {
            e.classList.add("active");
            e.querySelector("input").checked = "true";

            if (value == 'common-share') {
                $('#common').show();
                $('#preferred').hide();
            } else if (value == 'preferred-share') {
                $('#common').hide();
                $('#preferred').show();
            } else {
                $('#common').show();
                $('#preferred').show();
            }
        }
    </script>

    <script>
        $(document).ready(function() {


            //click to add new row
            $('.btn_add_row').click(function() {

                var key = parseFloat($("input[name='key']").attr('data-key'));

                // Increment the key by 1
                key++;

                // Log the updated key value
                $("input[name='key']").attr('data-key', key);
                console.log("Updated key value: " + key);

                var memberIndex = 0;
                var managerIndex = 0;
                var directorIndex = 0;

                var check_type = $("input[name='management_type']:checked").val();
                var htmlNewRow = '';

                if (check_type === 'Member_Managed') {

                    memberIndex++;

                    htmlNewRow += `<tr>
                                <td>
                                    <label for="">First Name Member</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="member[${key}][first_name]">
                                    </div>
                                </td>
                                <td>
                                    <label for="">Last Name</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="member[${key}][last_name]">
                                    </div>
                                </td>
                                <td>
                                    <select name="member[${key}][address_selector]" class="form-control addres_appended_member_row">
                                        <option value="default">Our Registered Agent Address</option>
                                        <option value="specifics">Specify Address</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="member[${key}][address]" class="address_mem_row form-control"
                                        placeholder="Your Address here..." style="display: none;">
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm remove-row">Remove</button>
                                </td>
                            </tr>`;

                    $('.addNewMemManag').append(htmlNewRow);


                } else if (check_type === 'Manager_Managed') {

                    managerIndex++;
                    htmlNewRow += `<tr>
                                <td>
                                    <label for="">First Name Manager</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="manager[${key}][first_name]">
                                    </div>
                                </td>
                                <td>
                                    <label for="">Last Name</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="manager[${key}][last_name]">
                                    </div>
                                </td>
                                <td>
                                    <select name="manager[${key}][address_selector]" class="form-control addres_appended_member_row">
                                        <option value="default">Our Registered Agent Address</option>
                                        <option value="specifics">Specify Address</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="manager[${key}][address]" class="address_mem_row form-control"
                                        placeholder="Your Address here..." style="display: none;">
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm remove-row">Remove</button>
                                </td>
                            </tr>`;

                    $('.addNewMemManag').append(htmlNewRow);

                } else {

                    directorIndex++;

                    htmlNewRow += `<tr>
                                <td>
                                    <label for="">First Name Director</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="director[${key}][first_name]">
                                    </div>
                                </td>
                                <td>
                                    <label for="">Last Name</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="director[${key}][last_name]">
                                    </div>
                                </td>
                                <td>
                                    <select name="director[${key}][address_selector]" class="form-control addres_appended_member_row">
                                        <option value="default">Our Registered Agent Address</option>
                                        <option value="specifics">Specify Address</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="director[${key}][address]" class="address_mem_row form-control"
                                        placeholder="Your Address here..." style="display: none;">
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm remove-row">Remove</button>
                                </td>
                            </tr>`;

                    $('.addNewMemManag').append(htmlNewRow);

                }


            });


            $('.addNewMemManag').on('click', '.remove-row', function() {
                $(this).closest('tr').remove();
            });

            //for new row added
            $('.addNewMemManag').on('change', '.addres_appended_member_row', function() {
                var address_append_row = $(this).val();
                var address_mem_row = $(this).closest('tr').find('.address_mem_row');

                if (address_append_row === 'specifics') {
                    address_mem_row.show();
                } else {
                    address_mem_row.hide();
                }
            });


            //for new add member or manager
            $('.addNewMemManag').on('change', '.addres_appended_member', function() {

                var address_append = $(this).val();
                if (address_append == 'specifics') {
                    $(this).closest('.addNewMemManag').find('.address_mem').show();
                } else {
                    $(this).closest('.addNewMemManag').find('.address_mem').hide();
                }

            });


            //Addres for president, secertary
            $('.presidentDropdwon').change(handlePST);
            // Trigger the change event on page load
            $('.presidentDropdwon').trigger('change');

            function handlePST() {
                var selectedValue = $(this).val();
                var addressInput = $(this).closest('.row').find('.address_corp');
                if (selectedValue === "specifics") {
                    addressInput.removeAttr("hidden");
                } else {
                    addressInput.attr("hidden", "hidden");
                }
            }

            //for already exitsting table
            $('.member_or_manager_table').on('change', '.addres_appended_member', handleAddressChange);
            // Trigger the change event on page load
            $('.member_or_manager_table .addres_appended_member').trigger('change');

            function handleAddressChange() {
                var address_append = $(this).val();
                if (address_append == 'specifics') {
                    $(this).closest('.member_or_manager_table').find('.address_mem').show();
                } else {
                    $(this).closest('.member_or_manager_table').find('.address_mem').hide();
                }
            }


            // $('.directorTable').on('change', '.addres_appended', function() {

            // for already existing director table
            $('.directorTable').on('change', '.addres_appended', hadleDirectorAddress);
            // Trigger the change event on page load
            $('.directorTable .addres_appended').trigger('change');

            function hadleDirectorAddress() {
                var address_app = $(this).val();
                if (address_app == 'specifics') {
                    $(this).closest('.directorTable').find('.address_direc').show();
                } else {
                    $(this).closest('.directorTable').find('.address_direc').hide();
                }

            }

            // });


            //For trade notes or allowanceInput
            $("#tradeNotesInput, #allowanceInput").on("input", function() {
                var tradeNotesValue = parseFloat($("#tradeNotesInput").val()) || 0;
                var allowanceValue = parseFloat($("#allowanceInput").val()) || 0;
                var result = tradeNotesValue - allowanceValue;

                if (!isNaN(result) && result >= 0) {
                    $("form #accountsReceivable").val(`$${result.toFixed(2)}`);
                    $("form #accountsReceivable").attr('data', result.toFixed(2));
                    $('.error_msg').text('');
                } else {
                    $("form #accountsReceivable").val("");
                    $('.error_msg').text('Subtract allowance more then trade & Accounts receivable');
                }
            });

            //For Intangible Assets or Accumulated Amortization
            $("#intangibleAssets, #accumulatedAmortization").on("input", function() {
                var intangibleValue = parseFloat($("#intangibleAssets").val()) || 0;
                var accumulatedValue = parseFloat($("#accumulatedAmortization").val()) || 0;
                var resultBoth = intangibleValue - accumulatedValue;

                if (!isNaN(resultBoth) && resultBoth >= 0) {
                    var data = $("form #intangibleAmortization").val(`$${resultBoth.toFixed(2)}`);
                    $("form #intangibleAmortization").attr('data', resultBoth.toFixed(2));
                    $('.error_msg_integ').text('');
                } else {
                    $("form #intangibleAmortization").val("");
                    $('.error_msg_integ').text('Intangible assets More then Accumulated Amortization');
                }


            });

            function calculateTotal() {
                var total = 0;

                $(".company input[type='number'], .company input[type='text']").not("#totalAssetsValue").not(
                        "#tradeNotesInput")
                    .not("#allowanceInput").not("#intangibleAssets").not("#accumulatedAmortization").each(
                        function() {
                            var value = parseFloat($(this).val()) || 0;
                            console.log(value);
                            total += value;
                        });

                var accountsReceivableValue = parseFloat($("#accountsReceivable").val().replace(/\$/g, '')) ||
                    0;



                total += accountsReceivableValue;

                var intangibleAmortizationValue = parseFloat($("#intangibleAmortization").val().replace(/\$/g,
                    '')) || 0;



                total += intangibleAmortizationValue;

                return total;
            }

            var orderSummaryAmountAdded = false;

            function updateTotal() {

                var totalAssetsValue = calculateTotal();

                $("#totalAssetsValue").val('$' + totalAssetsValue.toFixed(2));

                var tot = totalAssetsValue * 0.0002;

                if (tot > 60) {

                    $('#right').find('p.total_assets').text('$' + tot.toFixed(2));

                } else {

                    var existingOrderSummaryAmount = parseFloat($('#right').find('p.price1').text().replace('$',
                        ''));

                    if (!orderSummaryAmountAdded) {
                        existingOrderSummaryAmount += 60;
                        orderSummaryAmountAdded = true;
                    } else if (totalAssetsValue == 0) {
                        existingOrderSummaryAmount = 0;
                        orderSummaryAmountAdded = false;
                    }

                    $('#right').find('p.price1').text('$' + existingOrderSummaryAmount.toFixed(2));
                    $('#right').find('p.total_assets').text('$' + existingOrderSummaryAmount.toFixed(2));
                }
            }

            $(".company input").on("change input", function() {
                updateTotal();
            });

        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('client.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/ryulgomy/public_html/wyoming/resources/views/client/orders/edit_order.blade.php ENDPATH**/ ?>
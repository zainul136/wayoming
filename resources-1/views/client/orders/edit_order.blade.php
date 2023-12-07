@extends('client.layouts.master')
@section('title', $title)
@section('content')


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
                        @include('admin.partials._messages')
                        <!--begin::Form-->
                        {{ Form::open(['route' => 'store.client.orders', 'class' => 'form', 'id' => 'client_add_form', 'enctype' => 'multipart/form-data']) }}
                        @csrf

                        <input type="hidden" name="order_update_id" value="{{ $edit_client_order->id }}">

                        {{-- Previous History --}}
                        <input type="hidden" name="h_order_update_id" value="{{ $edit_client_order->id }}">
                        <input type="hidden" name="h_type_of_business"
                            value="{{ $edit_client_order->type_of_business ?? '' }}">
                        <input type="hidden" name="h_company_name" value="{{ $edit_client_order->company_name ?? '' }}">
                        <input type="hidden" name="h_first_name" value="{{ $edit_client_order->first_name ?? '' }}">
                        <input type="hidden" name="h_last_name" value="{{ $edit_client_order->last_name ?? '' }}">
                        <input type="hidden" name="h_email" value="{{ $edit_client_order->email ?? '' }}">
                        <input type="hidden" name="h_country" value="{{ $edit_client_order->country ?? '' }}">
                        <input type="hidden" name="h_phone_number" value="{{ $edit_client_order->phone_number ?? '' }}">
                        <input type="hidden" name="h_mailing_address"
                            value="{{ $edit_client_order->mailing_address ?? '' }}">
                        <input type="hidden" name="h_zip_postal_code"
                            value="{{ $edit_client_order->zip_postal_code ?? '' }}">
                        <input type="hidden" name="h_city" value="{{ $edit_client_order->city ?? '' }}">
                        <input type="hidden" name="h_state_province"
                            value="{{ $edit_client_order->state_province ?? '' }}">
                        <input type="hidden" name="h_attorney_first_name"
                            value="{{ $edit_client_order->attorney_first_name ?? '' }}">
                        <input type="hidden" name="h_attorney_last_name"
                            value="{{ $edit_client_order->attorney_last_name ?? '' }}">
                        <input type="hidden" name="h_attorney_mailing_address"
                            value="{{ $edit_client_order->attorney_mailing_address ?? '' }}">
                        <input type="hidden" name="h_attorney" value="{{ $edit_client_order->attorney ?? '' }}">





                        <h3>Personal Information</h3>
                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">First Name</label>
                                    <input type="text" name="first_name" value="{{ $edit_client_order->first_name }}"
                                        class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Last Name</label>
                                    <input type="text" name="last_name" value="{{ $edit_client_order->last_name }}"
                                        class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" name="email" value="{{ $edit_client_order->email }}"
                                        class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Country</label>
                                    <select class="form-control" name="country">
                                        <option value="AF"
                                            {{ $edit_client_order->country == 'AF' ? 'selected' : '' }}>Afghanistan
                                        </option>
                                        <option value="AX"
                                            {{ $edit_client_order->country == 'AX' ? 'selected' : '' }}>Åland</option>
                                        <option value="AL"
                                            {{ $edit_client_order->country == 'AL' ? 'selected' : '' }}>Albania</option>
                                        <option value="DZ"
                                            {{ $edit_client_order->country == 'DZ' ? 'selected' : '' }}>Algeria</option>
                                        <option value="AS"
                                            {{ $edit_client_order->country == 'AS' ? 'selected' : '' }}>American Samoa
                                        </option>
                                        <option value="AD"
                                            {{ $edit_client_order->country == 'AD' ? 'selected' : '' }}>Andorra</option>
                                        <option value="AO"
                                            {{ $edit_client_order->country == 'AO' ? 'selected' : '' }}>Angola</option>
                                        <option value="AI"
                                            {{ $edit_client_order->country == 'AI' ? 'selected' : '' }}>Anguilla</option>
                                        <option value="AQ"
                                            {{ $edit_client_order->country == 'AQ' ? 'selected' : '' }}>Antarctica</option>
                                        <option value="AG"
                                            {{ $edit_client_order->country == 'AG' ? 'selected' : '' }}>Antigua and Barbuda
                                        </option>
                                        <option value="AR"
                                            {{ $edit_client_order->country == 'AR' ? 'selected' : '' }}>Argentina</option>
                                        <option value="AM"
                                            {{ $edit_client_order->country == 'AM' ? 'selected' : '' }}>Armenia</option>
                                        <option value="AW"
                                            {{ $edit_client_order->country == 'AW' ? 'selected' : '' }}>Aruba</option>
                                        <option value="AU"
                                            {{ $edit_client_order->country == 'AU' ? 'selected' : '' }}>Australia</option>
                                        <option value="AT"
                                            {{ $edit_client_order->country == 'AT' ? 'selected' : '' }}>Austria</option>
                                        <option value="AZ"
                                            {{ $edit_client_order->country == 'AZ' ? 'selected' : '' }}>Azerbaijan</option>
                                        <option value="BS"
                                            {{ $edit_client_order->country == 'BS' ? 'selected' : '' }}>Bahamas</option>
                                        <option value="BH"
                                            {{ $edit_client_order->country == 'BH' ? 'selected' : '' }}>Bahrain</option>
                                        <option value="BD"
                                            {{ $edit_client_order->country == 'BD' ? 'selected' : '' }}>Bangladesh</option>
                                        <option value="BB"
                                            {{ $edit_client_order->country == 'BB' ? 'selected' : '' }}>Barbados</option>
                                        <option value="BY"
                                            {{ $edit_client_order->country == 'BY' ? 'selected' : '' }}>Belarus</option>
                                        <option value="BE"
                                            {{ $edit_client_order->country == 'BE' ? 'selected' : '' }}>Belgium</option>
                                        <option value="BZ"
                                            {{ $edit_client_order->country == 'BZ' ? 'selected' : '' }}>Belize</option>
                                        <option value="BJ"
                                            {{ $edit_client_order->country == 'BJ' ? 'selected' : '' }}>Benin</option>
                                        <option value="BM"
                                            {{ $edit_client_order->country == 'BM' ? 'selected' : '' }}>Bermuda</option>
                                        <option value="BT"
                                            {{ $edit_client_order->country == 'BT' ? 'selected' : '' }}>Bhutan</option>
                                        <option value="BO"
                                            {{ $edit_client_order->country == 'BO' ? 'selected' : '' }}>Bolivia</option>
                                        <option value="BQ"
                                            {{ $edit_client_order->country == 'BQ' ? 'selected' : '' }}>Bonaire</option>
                                        <option value="BA"
                                            {{ $edit_client_order->country == 'BA' ? 'selected' : '' }}>Bosnia and
                                            Herzegovina</option>
                                        <option value="BW"
                                            {{ $edit_client_order->country == 'BW' ? 'selected' : '' }}>Botswana</option>
                                        <option value="BV"
                                            {{ $edit_client_order->country == 'BV' ? 'selected' : '' }}>Bouvet Island
                                        </option>
                                        <option value="BR"
                                            {{ $edit_client_order->country == 'BR' ? 'selected' : '' }}>Brazil</option>
                                        <option value="IO"
                                            {{ $edit_client_order->country == 'IO' ? 'selected' : '' }}>British Indian
                                            Ocean Territory</option>
                                        <option value="VG"
                                            {{ $edit_client_order->country == 'VG' ? 'selected' : '' }}>British Virgin
                                            Islands</option>
                                        <option value="BN"
                                            {{ $edit_client_order->country == 'BN' ? 'selected' : '' }}>Brunei</option>
                                        <option value="BG"
                                            {{ $edit_client_order->country == 'BG' ? 'selected' : '' }}>Bulgaria</option>
                                        <option value="BF"
                                            {{ $edit_client_order->country == 'BF' ? 'selected' : '' }}>Burkina Faso
                                        </option>
                                        <option value="BI"
                                            {{ $edit_client_order->country == 'BI' ? 'selected' : '' }}>Burundi</option>
                                        <option value="KH"
                                            {{ $edit_client_order->country == 'KH' ? 'selected' : '' }}>Cambodia</option>
                                        <option value="CM"
                                            {{ $edit_client_order->country == 'CM' ? 'selected' : '' }}>Cameroon</option>
                                        <option value="CA"
                                            {{ $edit_client_order->country == 'CA' ? 'selected' : '' }}>Canada</option>
                                        <option value="CV"
                                            {{ $edit_client_order->country == 'CV' ? 'selected' : '' }}>Cape Verde</option>
                                        <option value="KY"
                                            {{ $edit_client_order->country == 'KY' ? 'selected' : '' }}>Cayman Islands
                                        </option>
                                        <option value="CF"
                                            {{ $edit_client_order->country == 'CF' ? 'selected' : '' }}>Central African
                                            Republic</option>
                                        <option value="TD"
                                            {{ $edit_client_order->country == 'TD' ? 'selected' : '' }}>Chad</option>
                                        <option value="CL"
                                            {{ $edit_client_order->country == 'CL' ? 'selected' : '' }}>Chile</option>
                                        <option value="CN"
                                            {{ $edit_client_order->country == 'CN' ? 'selected' : '' }}>China</option>
                                        <option value="CX"
                                            {{ $edit_client_order->country == 'CX' ? 'selected' : '' }}>Christmas Island
                                        </option>
                                        <option value="CC"
                                            {{ $edit_client_order->country == 'CC' ? 'selected' : '' }}>Cocos [Keeling]
                                            Islands</option>
                                        <option value="CO"
                                            {{ $edit_client_order->country == 'CO' ? 'selected' : '' }}>Colombia</option>
                                        <option value="KM"
                                            {{ $edit_client_order->country == 'KM' ? 'selected' : '' }}>Comoros</option>
                                        <option value="CK"
                                            {{ $edit_client_order->country == 'CK' ? 'selected' : '' }}>Cook Islands
                                        </option>
                                        <option value="CR"
                                            {{ $edit_client_order->country == 'CR' ? 'selected' : '' }}>Costa Rica</option>
                                        <option value="HR"
                                            {{ $edit_client_order->country == 'HR' ? 'selected' : '' }}>Croatia</option>
                                        <option value="CU"
                                            {{ $edit_client_order->country == 'CU' ? 'selected' : '' }}>Cuba</option>
                                        <option value="CW"
                                            {{ $edit_client_order->country == 'CW' ? 'selected' : '' }}>Curacao</option>
                                        <option value="CY"
                                            {{ $edit_client_order->country == 'CY' ? 'selected' : '' }}>Cyprus</option>
                                        <option value="CZ"
                                            {{ $edit_client_order->country == 'CZ' ? 'selected' : '' }}>Czech Republic
                                        </option>
                                        <option value="CD"
                                            {{ $edit_client_order->country == 'CD' ? 'selected' : '' }}>Democratic Republic
                                            of the Congo</option>
                                        <option value="DK"
                                            {{ $edit_client_order->country == 'DK' ? 'selected' : '' }}>Denmark</option>
                                        <option value="DJ"
                                            {{ $edit_client_order->country == 'DJ' ? 'selected' : '' }}>Djibouti</option>
                                        <option value="DM"
                                            {{ $edit_client_order->country == 'DM' ? 'selected' : '' }}>Dominica</option>
                                        <option value="DO"
                                            {{ $edit_client_order->country == 'DO' ? 'selected' : '' }}>Dominican Republic
                                        </option>
                                        <option value="TL"
                                            {{ $edit_client_order->country == 'TL' ? 'selected' : '' }}>East Timor</option>
                                        <option value="EC"
                                            {{ $edit_client_order->country == 'EC' ? 'selected' : '' }}>Ecuador</option>
                                        <option value="EG"
                                            {{ $edit_client_order->country == 'EG' ? 'selected' : '' }}>Egypt</option>
                                        <option value="SV"
                                            {{ $edit_client_order->country == 'SV' ? 'selected' : '' }}>El Salvador
                                        </option>
                                        <option value="GQ"
                                            {{ $edit_client_order->country == 'GQ' ? 'selected' : '' }}>Equatorial Guinea
                                        </option>
                                        <option value="ER"
                                            {{ $edit_client_order->country == 'ER' ? 'selected' : '' }}>Eritrea</option>
                                        <option value="EE"
                                            {{ $edit_client_order->country == 'EE' ? 'selected' : '' }}>Estonia</option>
                                        <option value="ET"
                                            {{ $edit_client_order->country == 'ET' ? 'selected' : '' }}>Ethiopia</option>
                                        <option value="FK"
                                            {{ $edit_client_order->country == 'FK' ? 'selected' : '' }}>Falkland Islands
                                        </option>
                                        <option value="FO"
                                            {{ $edit_client_order->country == 'FO' ? 'selected' : '' }}>Faroe Islands
                                        </option>
                                        <option value="FJ"
                                            {{ $edit_client_order->country == 'FJ' ? 'selected' : '' }}>Fiji</option>
                                        <option value="FI"
                                            {{ $edit_client_order->country == 'FI' ? 'selected' : '' }}>Finland</option>
                                        <option value="FR"
                                            {{ $edit_client_order->country == 'FR' ? 'selected' : '' }}>France</option>
                                        <option value="GF"
                                            {{ $edit_client_order->country == 'GF' ? 'selected' : '' }}>French Guiana
                                        </option>
                                        <option value="PF"
                                            {{ $edit_client_order->country == 'PF' ? 'selected' : '' }}>French Polynesia
                                        </option>
                                        <option value="TF"
                                            {{ $edit_client_order->country == 'TF' ? 'selected' : '' }}>French Southern
                                            Territories</option>
                                        <option value="GA"
                                            {{ $edit_client_order->country == 'GA' ? 'selected' : '' }}>Gabon</option>
                                        <option value="GM"
                                            {{ $edit_client_order->country == 'GM' ? 'selected' : '' }}>Gambia</option>

                                        <option value="GE"
                                            {{ $edit_client_order->country == 'GE' ? 'selected' : '' }}>Georgia</option>
                                        <option value="DE"
                                            {{ $edit_client_order->country == 'DE' ? 'selected' : '' }}>Germany</option>
                                        <option value="GH"
                                            {{ $edit_client_order->country == 'GH' ? 'selected' : '' }}>Ghana</option>
                                        <option value="GI"
                                            {{ $edit_client_order->country == 'GI' ? 'selected' : '' }}>Gibraltar</option>
                                        <option value="GR"
                                            {{ $edit_client_order->country == 'GR' ? 'selected' : '' }}>Greece</option>
                                        <option value="GL"
                                            {{ $edit_client_order->country == 'GL' ? 'selected' : '' }}>Greenland</option>
                                        <option value="GD"
                                            {{ $edit_client_order->country == 'GD' ? 'selected' : '' }}>Grenada</option>
                                        <option value="GP"
                                            {{ $edit_client_order->country == 'GP' ? 'selected' : '' }}>Guadeloupe
                                        </option>
                                        <option value="GU"
                                            {{ $edit_client_order->country == 'GU' ? 'selected' : '' }}>Guam</option>
                                        <option value="GT"
                                            {{ $edit_client_order->country == 'GT' ? 'selected' : '' }}>Guatemala</option>
                                        <option value="GG"
                                            {{ $edit_client_order->country == 'GG' ? 'selected' : '' }}>Guernsey</option>
                                        <option value="GN"
                                            {{ $edit_client_order->country == 'GN' ? 'selected' : '' }}>Guinea</option>
                                        <option value="GW"
                                            {{ $edit_client_order->country == 'GW' ? 'selected' : '' }}>Guinea-Bissau
                                        </option>
                                        <option value="GY"
                                            {{ $edit_client_order->country == 'GY' ? 'selected' : '' }}>Guyana</option>
                                        <option value="HT"
                                            {{ $edit_client_order->country == 'HT' ? 'selected' : '' }}>Haiti</option>
                                        <option value="HM"
                                            {{ $edit_client_order->country == 'HM' ? 'selected' : '' }}>Heard Island and
                                            McDonald Islands</option>
                                        <option value="HN"
                                            {{ $edit_client_order->country == 'HN' ? 'selected' : '' }}>Honduras</option>
                                        <option value="HK"
                                            {{ $edit_client_order->country == 'HK' ? 'selected' : '' }}>Hong Kong</option>
                                        <option value="HU"
                                            {{ $edit_client_order->country == 'HU' ? 'selected' : '' }}>Hungary</option>
                                        <option value="IS"
                                            {{ $edit_client_order->country == 'IS' ? 'selected' : '' }}>Iceland</option>
                                        <option value="IN"
                                            {{ $edit_client_order->country == 'IN' ? 'selected' : '' }}>India</option>
                                        <option value="ID"
                                            {{ $edit_client_order->country == 'ID' ? 'selected' : '' }}>Indonesia</option>
                                        <option value="IR"
                                            {{ $edit_client_order->country == 'IR' ? 'selected' : '' }}>Iran</option>
                                        <option value="IQ"
                                            {{ $edit_client_order->country == 'IQ' ? 'selected' : '' }}>Iraq</option>
                                        <option value="IE"
                                            {{ $edit_client_order->country == 'IE' ? 'selected' : '' }}>Ireland</option>
                                        <option value="IM"
                                            {{ $edit_client_order->country == 'IM' ? 'selected' : '' }}>Isle of Man
                                        </option>
                                        <option value="IL"
                                            {{ $edit_client_order->country == 'IL' ? 'selected' : '' }}>Israel</option>
                                        <option value="IT"
                                            {{ $edit_client_order->country == 'IT' ? 'selected' : '' }}>Italy</option>
                                        <option value="CI"
                                            {{ $edit_client_order->country == 'CI' ? 'selected' : '' }}>Ivory Coast
                                        </option>
                                        <option value="JM"
                                            {{ $edit_client_order->country == 'JM' ? 'selected' : '' }}>Jamaica</option>
                                        <option value="JP"
                                            {{ $edit_client_order->country == 'JP' ? 'selected' : '' }}>Japan</option>
                                        <option value="JE"
                                            {{ $edit_client_order->country == 'JE' ? 'selected' : '' }}>Jersey</option>
                                        <option value="JO"
                                            {{ $edit_client_order->country == 'JO' ? 'selected' : '' }}>Jordan</option>
                                        <option value="KZ"
                                            {{ $edit_client_order->country == 'KZ' ? 'selected' : '' }}>Kazakhstan
                                        </option>
                                        <option value="KE"
                                            {{ $edit_client_order->country == 'KE' ? 'selected' : '' }}>Kenya</option>
                                        <option value="KI"
                                            {{ $edit_client_order->country == 'KI' ? 'selected' : '' }}>Kiribati</option>
                                        <option value="XK"
                                            {{ $edit_client_order->country == 'XK' ? 'selected' : '' }}>Kosovo</option>
                                        <option value="KW"
                                            {{ $edit_client_order->country == 'KW' ? 'selected' : '' }}>Kuwait</option>
                                        <option value="KG"
                                            {{ $edit_client_order->country == 'KG' ? 'selected' : '' }}>Kyrgyzstan
                                        </option>
                                        <option value="LA"
                                            {{ $edit_client_order->country == 'LA' ? 'selected' : '' }}>Laos</option>
                                        <option value="LV"
                                            {{ $edit_client_order->country == 'LV' ? 'selected' : '' }}>Latvia</option>
                                        <option value="LB"
                                            {{ $edit_client_order->country == 'LB' ? 'selected' : '' }}>Lebanon</option>
                                        <option value="LS"
                                            {{ $edit_client_order->country == 'LS' ? 'selected' : '' }}>Lesotho</option>
                                        <option value="LR"
                                            {{ $edit_client_order->country == 'LR' ? 'selected' : '' }}>Liberia</option>
                                        <option value="LY"
                                            {{ $edit_client_order->country == 'LY' ? 'selected' : '' }}>Libya</option>
                                        <option value="LI"
                                            {{ $edit_client_order->country == 'LI' ? 'selected' : '' }}>Liechtenstein
                                        </option>
                                        <option value="LT"
                                            {{ $edit_client_order->country == 'LT' ? 'selected' : '' }}>Lithuania</option>
                                        <option value="LU"
                                            {{ $edit_client_order->country == 'LU' ? 'selected' : '' }}>Luxembourg
                                        </option>
                                        <option value="MO"
                                            {{ $edit_client_order->country == 'MO' ? 'selected' : '' }}>Macao</option>
                                        <option value="MK"
                                            {{ $edit_client_order->country == 'MK' ? 'selected' : '' }}>Macedonia</option>
                                        <option value="MG"
                                            {{ $edit_client_order->country == 'MG' ? 'selected' : '' }}>Madagascar
                                        </option>
                                        <option value="MW"
                                            {{ $edit_client_order->country == 'MW' ? 'selected' : '' }}>Malawi</option>
                                        <option value="MY"
                                            {{ $edit_client_order->country == 'MY' ? 'selected' : '' }}>Malaysia</option>
                                        <option value="MV"
                                            {{ $edit_client_order->country == 'MV' ? 'selected' : '' }}>Maldives</option>
                                        <option value="ML"
                                            {{ $edit_client_order->country == 'ML' ? 'selected' : '' }}>Mali</option>
                                        <option value="MT"
                                            {{ $edit_client_order->country == 'MT' ? 'selected' : '' }}>Malta</option>
                                        <option value="MH"
                                            {{ $edit_client_order->country == 'MH' ? 'selected' : '' }}>Marshall Islands
                                        </option>
                                        <option value="MQ"
                                            {{ $edit_client_order->country == 'MQ' ? 'selected' : '' }}>Martinique
                                        </option>
                                        <option value="MR"
                                            {{ $edit_client_order->country == 'MR' ? 'selected' : '' }}>Mauritania
                                        </option>
                                        <option value="MU"
                                            {{ $edit_client_order->country == 'MU' ? 'selected' : '' }}>Mauritius</option>
                                        <option value="YT"
                                            {{ $edit_client_order->country == 'YT' ? 'selected' : '' }}>Mayotte</option>
                                        <option value="MX"
                                            {{ $edit_client_order->country == 'MX' ? 'selected' : '' }}>Mexico</option>
                                        <option value="FM"
                                            {{ $edit_client_order->country == 'FM' ? 'selected' : '' }}>Micronesia
                                        </option>
                                        <option value="MD"
                                            {{ $edit_client_order->country == 'MD' ? 'selected' : '' }}>Moldova</option>
                                        <option value="MC"
                                            {{ $edit_client_order->country == 'MC' ? 'selected' : '' }}>Monaco</option>
                                        <option value="MN"
                                            {{ $edit_client_order->country == 'MN' ? 'selected' : '' }}>Mongolia</option>
                                        <option value="ME"
                                            {{ $edit_client_order->country == 'ME' ? 'selected' : '' }}>Montenegro
                                        </option>
                                        <option value="MS"
                                            {{ $edit_client_order->country == 'MS' ? 'selected' : '' }}>Montserrat
                                        </option>
                                        <option value="MA"
                                            {{ $edit_client_order->country == 'MA' ? 'selected' : '' }}>Morocco</option>
                                        <option value="MZ"
                                            {{ $edit_client_order->country == 'MZ' ? 'selected' : '' }}>Mozambique
                                        </option>
                                        <option value="MM"
                                            {{ $edit_client_order->country == 'MM' ? 'selected' : '' }}>Myanmar [Burma]
                                        </option>
                                        <option value="NA"
                                            {{ $edit_client_order->country == 'NA' ? 'selected' : '' }}>Namibia</option>
                                        <option value="NR"
                                            {{ $edit_client_order->country == 'NR' ? 'selected' : '' }}>Nauru</option>
                                        <option value="NP"
                                            {{ $edit_client_order->country == 'NP' ? 'selected' : '' }}>Nepal</option>
                                        <option value="NL"
                                            {{ $edit_client_order->country == 'NL' ? 'selected' : '' }}>Netherlands
                                        </option>
                                        <option value="NC"
                                            {{ $edit_client_order->country == 'NC' ? 'selected' : '' }}>New Caledonia
                                        </option>
                                        <option value="NZ"
                                            {{ $edit_client_order->country == 'NZ' ? 'selected' : '' }}>New Zealand
                                        </option>
                                        <option value="NI"
                                            {{ $edit_client_order->country == 'NI' ? 'selected' : '' }}>Nicaragua</option>
                                        <option value="NE"
                                            {{ $edit_client_order->country == 'NE' ? 'selected' : '' }}>Niger</option>
                                        <option value="NG"
                                            {{ $edit_client_order->country == 'NG' ? 'selected' : '' }}>Nigeria</option>
                                        <option value="NU"
                                            {{ $edit_client_order->country == 'NU' ? 'selected' : '' }}>Niue</option>
                                        <option value="NF"
                                            {{ $edit_client_order->country == 'NF' ? 'selected' : '' }}>Norfolk Island
                                        </option>
                                        <option value="KP"
                                            {{ $edit_client_order->country == 'KP' ? 'selected' : '' }}>North Korea
                                        </option>
                                        <option value="MP"
                                            {{ $edit_client_order->country == 'MP' ? 'selected' : '' }}>Northern Mariana
                                            Islands</option>
                                        <option value="NO"
                                            {{ $edit_client_order->country == 'NO' ? 'selected' : '' }}>Norway</option>
                                        <option value="OM"
                                            {{ $edit_client_order->country == 'OM' ? 'selected' : '' }}>Oman</option>
                                        <option value="PK"
                                            {{ $edit_client_order->country == 'PK' ? 'selected' : '' }}>Pakistan</option>
                                        <option value="PW"
                                            {{ $edit_client_order->country == 'PW' ? 'selected' : '' }}>Palau</option>
                                        <option value="PS"
                                            {{ $edit_client_order->country == 'PS' ? 'selected' : '' }}>Palestine</option>
                                        <option value="PA"
                                            {{ $edit_client_order->country == 'PA' ? 'selected' : '' }}>Panama</option>
                                        <option value="PG"
                                            {{ $edit_client_order->country == 'PG' ? 'selected' : '' }}>Papua New Guinea
                                        </option>
                                        <option value="PY"
                                            {{ $edit_client_order->country == 'PY' ? 'selected' : '' }}>Paraguay</option>
                                        <option value="PE"
                                            {{ $edit_client_order->country == 'PE' ? 'selected' : '' }}>Peru</option>
                                        <option value="PH"
                                            {{ $edit_client_order->country == 'PH' ? 'selected' : '' }}>Philippines
                                        </option>
                                        <option value="PN"
                                            {{ $edit_client_order->country == 'PN' ? 'selected' : '' }}>Pitcairn Islands
                                        </option>
                                        <option value="PL"
                                            {{ $edit_client_order->country == 'PL' ? 'selected' : '' }}>Poland</option>
                                        <option value="PT"
                                            {{ $edit_client_order->country == 'PT' ? 'selected' : '' }}>Portugal</option>
                                        <option value="PR"
                                            {{ $edit_client_order->country == 'PR' ? 'selected' : '' }}>Puerto Rico
                                        </option>
                                        <option value="QA"
                                            {{ $edit_client_order->country == 'QA' ? 'selected' : '' }}>Qatar</option>
                                        <option value="CG"
                                            {{ $edit_client_order->country == 'CG' ? 'selected' : '' }}>Republic of the
                                            Congo</option>
                                        <option value="RE"
                                            {{ $edit_client_order->country == 'RE' ? 'selected' : '' }}>Réunion</option>
                                        <option value="RO"
                                            {{ $edit_client_order->country == 'RO' ? 'selected' : '' }}>Romania</option>
                                        <option value="RU"
                                            {{ $edit_client_order->country == 'RU' ? 'selected' : '' }}>Russia</option>
                                        <option value="RW"
                                            {{ $edit_client_order->country == 'RW' ? 'selected' : '' }}>Rwanda</option>
                                        <option value="BL"
                                            {{ $edit_client_order->country == 'BL' ? 'selected' : '' }}>Saint Barthélemy
                                        </option>
                                        <option value="SH"
                                            {{ $edit_client_order->country == 'SH' ? 'selected' : '' }}>Saint Helena
                                        </option>
                                        <option value="KN"
                                            {{ $edit_client_order->country == 'KN' ? 'selected' : '' }}>Saint Kitts and
                                            Nevis</option>
                                        <option value="LC"
                                            {{ $edit_client_order->country == 'LC' ? 'selected' : '' }}>Saint Lucia
                                        </option>
                                        <option value="MF"
                                            {{ $edit_client_order->country == 'MF' ? 'selected' : '' }}>Saint Martin
                                        </option>
                                        <option value="PM"
                                            {{ $edit_client_order->country == 'PM' ? 'selected' : '' }}>Saint Pierre and
                                            Miquelon</option>
                                        <option value="VC"
                                            {{ $edit_client_order->country == 'VC' ? 'selected' : '' }}>Saint Vincent and
                                            the Grenadines</option>
                                        <option value="WS"
                                            {{ $edit_client_order->country == 'WS' ? 'selected' : '' }}>Samoa</option>
                                        <option value="SM"
                                            {{ $edit_client_order->country == 'SM' ? 'selected' : '' }}>San Marino
                                        </option>
                                        <option value="ST"
                                            {{ $edit_client_order->country == 'ST' ? 'selected' : '' }}>São Tomé and
                                            Príncipe</option>
                                        <option value="SA"
                                            {{ $edit_client_order->country == 'SA' ? 'selected' : '' }}>Saudi Arabia
                                        </option>
                                        <option value="SN"
                                            {{ $edit_client_order->country == 'SN' ? 'selected' : '' }}>Senegal</option>
                                        <option value="RS"
                                            {{ $edit_client_order->country == 'RS' ? 'selected' : '' }}>Serbia</option>
                                        <option value="SC"
                                            {{ $edit_client_order->country == 'SC' ? 'selected' : '' }}>Seychelles
                                        </option>
                                        <option value="SL"
                                            {{ $edit_client_order->country == 'SL' ? 'selected' : '' }}>Sierra Leone
                                        </option>
                                        <option value="SG"
                                            {{ $edit_client_order->country == 'SG' ? 'selected' : '' }}>Singapore</option>
                                        <option value="SX"
                                            {{ $edit_client_order->country == 'SX' ? 'selected' : '' }}>Sint Maarten
                                        </option>
                                        <option value="SK"
                                            {{ $edit_client_order->country == 'SK' ? 'selected' : '' }}>Slovakia</option>
                                        <option value="SI"
                                            {{ $edit_client_order->country == 'SI' ? 'selected' : '' }}>Slovenia</option>
                                        <option value="SB"
                                            {{ $edit_client_order->country == 'SB' ? 'selected' : '' }}>Solomon Islands
                                        </option>
                                        <option value="SO"
                                            {{ $edit_client_order->country == 'SO' ? 'selected' : '' }}>Somalia</option>
                                        <option value="ZA"
                                            {{ $edit_client_order->country == 'ZA' ? 'selected' : '' }}>South Africa
                                        </option>
                                        <option value="GS"
                                            {{ $edit_client_order->country == 'GS' ? 'selected' : '' }}>South Georgia and
                                            the South Sandwich Islands</option>
                                        <option value="KR"
                                            {{ $edit_client_order->country == 'KR' ? 'selected' : '' }}>South Korea
                                        </option>
                                        <option value="SS"
                                            {{ $edit_client_order->country == 'SS' ? 'selected' : '' }}>South Sudan
                                        </option>
                                        <option value="ES"
                                            {{ $edit_client_order->country == 'ES' ? 'selected' : '' }}>Spain</option>
                                        <option value="LK"
                                            {{ $edit_client_order->country == 'LK' ? 'selected' : '' }}>Sri Lanka</option>
                                        <option value="SD"
                                            {{ $edit_client_order->country == 'SD' ? 'selected' : '' }}>Sudan</option>
                                        <option value="SR"
                                            {{ $edit_client_order->country == 'SR' ? 'selected' : '' }}>Suriname</option>
                                        <option value="SJ"
                                            {{ $edit_client_order->country == 'SJ' ? 'selected' : '' }}>Svalbard and Jan
                                            Mayen</option>
                                        <option value="SZ"
                                            {{ $edit_client_order->country == 'SZ' ? 'selected' : '' }}>Swaziland</option>
                                        <option value="SE"
                                            {{ $edit_client_order->country == 'SE' ? 'selected' : '' }}>Sweden</option>
                                        <option value="CH"
                                            {{ $edit_client_order->country == 'CH' ? 'selected' : '' }}>Switzerland
                                        </option>
                                        <option value="SY"
                                            {{ $edit_client_order->country == 'SY' ? 'selected' : '' }}>Syria</option>
                                        <option value="TW"
                                            {{ $edit_client_order->country == 'TW' ? 'selected' : '' }}>Taiwan</option>
                                        <option value="TJ"
                                            {{ $edit_client_order->country == 'TJ' ? 'selected' : '' }}>Tajikistan
                                        </option>
                                        <option value="TZ"
                                            {{ $edit_client_order->country == 'TZ' ? 'selected' : '' }}>Tanzania</option>
                                        <option value="TH"
                                            {{ $edit_client_order->country == 'TH' ? 'selected' : '' }}>Thailand</option>
                                        <option value="TG"
                                            {{ $edit_client_order->country == 'TG' ? 'selected' : '' }}>Togo</option>
                                        <option value="TK"
                                            {{ $edit_client_order->country == 'TK' ? 'selected' : '' }}>Tokelau</option>
                                        <option value="TO"
                                            {{ $edit_client_order->country == 'TO' ? 'selected' : '' }}>Tonga</option>
                                        <option value="TT"
                                            {{ $edit_client_order->country == 'TT' ? 'selected' : '' }}>Trinidad and
                                            Tobago</option>
                                        <option value="TN"
                                            {{ $edit_client_order->country == 'TN' ? 'selected' : '' }}>Tunisia</option>
                                        <option value="TR"
                                            {{ $edit_client_order->country == 'TR' ? 'selected' : '' }}>Turkey</option>
                                        <option value="TM"
                                            {{ $edit_client_order->country == 'TM' ? 'selected' : '' }}>Turkmenistan
                                        </option>
                                        <option value="TC"
                                            {{ $edit_client_order->country == 'TC' ? 'selected' : '' }}>Turks and Caicos
                                            Islands</option>
                                        <option value="TV"
                                            {{ $edit_client_order->country == 'TV' ? 'selected' : '' }}>Tuvalu</option>
                                        <option value="UM"
                                            {{ $edit_client_order->country == 'UM' ? 'selected' : '' }}>U.S. Minor
                                            Outlying Islands</option>
                                        <option value="VI"
                                            {{ $edit_client_order->country == 'VI' ? 'selected' : '' }}>U.S. Virgin
                                            Islands</option>
                                        <option value="UG"
                                            {{ $edit_client_order->country == 'UG' ? 'selected' : '' }}>Uganda</option>
                                        <option value="UA"
                                            {{ $edit_client_order->country == 'UA' ? 'selected' : '' }}>Ukraine</option>
                                        <option value="AE"
                                            {{ $edit_client_order->country == 'AE' ? 'selected' : '' }}>United Arab
                                            Emirates</option>
                                        <option value="GB"
                                            {{ $edit_client_order->country == 'GB' ? 'selected' : '' }}>United Kingdom
                                        </option>
                                        <option value="US"
                                            {{ $edit_client_order->country == 'US' ? 'selected' : '' }}>United States
                                        </option>
                                        <option value="UY"
                                            {{ $edit_client_order->country == 'UY' ? 'selected' : '' }}>Uruguay</option>
                                        <option value="UZ"
                                            {{ $edit_client_order->country == 'UZ' ? 'selected' : '' }}>Uzbekistan
                                        </option>
                                        <option value="VU"
                                            {{ $edit_client_order->country == 'VU' ? 'selected' : '' }}>Vanuatu</option>
                                        <option value="VA"
                                            {{ $edit_client_order->country == 'VA' ? 'selected' : '' }}>Vatican City
                                        </option>
                                        <option value="VE"
                                            {{ $edit_client_order->country == 'VE' ? 'selected' : '' }}>Venezuela</option>
                                        <option value="VN"
                                            {{ $edit_client_order->country == 'VN' ? 'selected' : '' }}>Vietnam</option>
                                        <option value="WF"
                                            {{ $edit_client_order->country == 'WF' ? 'selected' : '' }}>Wallis and Futuna
                                        </option>
                                        <option value="EH"
                                            {{ $edit_client_order->country == 'EH' ? 'selected' : '' }}>Western Sahara
                                        </option>
                                        <option value="YE"
                                            {{ $edit_client_order->country == 'YE' ? 'selected' : '' }}>Yemen</option>
                                        <option value="ZM"
                                            {{ $edit_client_order->country == 'ZM' ? 'selected' : '' }}>Zambia</option>
                                        <option value="ZW"
                                            {{ $edit_client_order->country == 'ZW' ? 'selected' : '' }}>Zimbabwe</option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Phone Number</label>
                                    <input type="text" name="phone_number"
                                        value="{{ $edit_client_order->phone_number }}" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Mailing Address</label>
                                    <input type="text" name="mailing_address"
                                        value="{{ $edit_client_order->mailing_address }}" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Zip Code</label>
                                    <input type="text" name="zip_postal_code"
                                        value="{{ $edit_client_order->zip_postal_code }}" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">City</label>
                                    <input type="text" name="city" value="{{ $edit_client_order->city }}"
                                        class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Province</label>
                                    <input type="text" name="state_province"
                                        value="{{ $edit_client_order->state_province }}" class="form-control">
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
                                        value="{{ $edit_client_order->company_name }}" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Type Of Business</label>
                                    <input type="text" name="type_of_business"
                                        value="{{ $edit_client_order->type_of_business }}" class="form-control"
                                        readonly>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Order Type</label>
                                    <select name="order_type" class="form-control" disabled>
                                        <option value="0"
                                            {{ $edit_client_order->order_type == 0 ? 'selected' : '' }}>Form a New Company
                                        </option>
                                        <option value="1"
                                            {{ $edit_client_order->order_type == 1 ? 'selected' : '' }}>Registered Agent
                                        </option>
                                        <option value="2"
                                            {{ $edit_client_order->order_type == 2 ? 'selected' : '' }}>Renewal</option>
                                    </select>
                                    <input type="hidden" name="order_type_hidden" value="{{ $edit_client_order->order_type }}">
                                </div>
                            </div>

                        </div>


                        @if (count($edit_client_order->sharetypes) > 0 || count($edit_client_order->compmanagment) > 0)

                            <h3 class="mb-4" style="margin-top: 20px;">Company Management</h3>
                            {{-- each loop for comp management start --}}
                            @foreach ($edit_client_order->compmanagment as $compmanag)
                                <input type="hidden" name="{{ $compmanag->type }}[0][comp_m_id]"
                                    value="{{ $compmanag->id }}">

                                <label for="" style="font-weight: bold">{{ $compmanag->type }}</label>
                                <div class="row {{ $compmanag->type }}">

                                    <input type="hidden" name="comptype" value="{{ $compmanag->type }}">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">First Name</label>
                                            <input type="text" name="{{ $compmanag->type }}[0][first_name]"
                                                value="{{ $compmanag->first_name }}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Last Name</label>
                                            <input type="text" name="{{ $compmanag->type }}[0][last_name]"
                                                value="{{ $compmanag->last_name }}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Address</label>

                                            <select name="{{ $compmanag->type }}[0][address_selector]"
                                                class="form-control presidentDropdwon">
                                                <option value="default"
                                                    {{ $compmanag->address == 'default' ? 'selected' : '' }}>Our
                                                    Registered Agent Address</option>
                                                <option value="specifics"
                                                    {{ $compmanag->address != 'default' ? 'selected' : '' }}>Specify
                                                    Address</option>
                                            </select>

                                            <input type="text" name="{{ $compmanag->type }}[0][address_corp]" hidden
                                                class="address_corp form-control" placeholder="Your Address here..."
                                                style="border-radius: 0 0 .4rem .4rem;"
                                                value="{{ $compmanag->address }}">

                                        </div>
                                    </div>

                                </div>
                            @endforeach
                            {{-- each loop for comp management end --}}




                            {{-- each loop for share type start --}}
                            @if (count($edit_client_order->sharetypes) > 0)
                                <h4 style="margin-top: 10px; margin-bottom: 15px;">Share Type</h4>
                                <div class="d-flex">
                                    <label class="radio-inline" onclick="SelectServiceForShare(this, 'common-share')">
                                        <input type="radio" class="mr-3" name="share_type" value="common">Common
                                        Share
                                    </label>
                                    <label class="radio-inline" onclick="SelectServiceForShare(this, 'preferred-share')">
                                        <input type="radio" class="mr-3" name="share_type"
                                            value="preferred">Preferred
                                        Shares
                                    </label>
                                    <label class="radio-inline" onclick="SelectServiceForShare(this, 'both-share')">
                                        <input type="radio" class="mr-3" name="share_type" checked
                                            value="both">Both
                                        Common and
                                        Preferred
                                    </label>
                                </div>
                            @endif

                            @foreach ($edit_client_order->sharetypes as $share)
                                <div id="{{ $share->type }}" style="display: none;">
                                    <input type="hidden" name="{{ $share->type }}[0][share_type_id]"
                                        value="{{ $share->id }}">
                                    <h5 style="margin-top: 10px; margin-bottom: 15px;">{{ $share->type }} Share</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">Number {{ $share->type }} Shares</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control"
                                                    name="{{ $share->type }}[0][share_number]"
                                                    value="{{ $share->share_number }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Par Value {{ $share->type }} Share</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control"
                                                    name="{{ $share->type }}[0][share_value]"
                                                    value="{{ $share->share_value }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            {{-- each loop for share type end --}}

                        @endif

                        @if (count($edit_client_order->managements) > 0)
                            {{-- each loop for director start --}}

                            @if ($edit_client_order->type_of_business == 'LLC')
                                <h4 style="margin-top: 10px; margin-bottom: 15px;">
                                    {{ ucfirst($edit_client_order->omcheckbox->type) }}</h4>

                                <button type="button" class="btn btn-primary btn-sm btn_add_row mb-3">Add
                                    {{ ucfirst($edit_client_order->omcheckbox->type) }}</button>

                                    <input type="hidden" name="key"
                                    value="{{ $edit_client_order->managements->count() }}"
                                    data-key="{{ $edit_client_order->managements->count() }}">

                                <div class="d-flex" id="memberManagerDiv">
                                    <label class="radio-inline" style="display: none;">
                                        <input type="radio" class="mr-3" name="management_type"
                                            value="Member_Managed"
                                            {{ ($edit_client_order->omcheckbox->type ?? '') == 'member' ? 'checked' : '' }}>Member
                                    </label>
                                    <label class="radio-inline" style="display: none;">
                                        <input type="radio" class="mr-3" name="management_type"
                                            value="Manager_Managed"
                                            {{ ($edit_client_order->omcheckbox->type ?? '') == 'manager' ? 'checked' : '' }}>Manager
                                    </label>
                                </div>
                            @else
                                <h4 style="margin-top: 10px; margin-bottom: 15px;">Director(S)</h4>
                                <button type="button" class="btn btn-primary btn-sm btn_add_row mb-3">Add
                                    {{ ucfirst($edit_client_order->omcheckbox->type) }}</button>
                                <input type="hidden" name="key"
                                    value="{{ $edit_client_order->managements->count() }}"
                                    data-key="{{ $edit_client_order->managements->count() }}">
                            @endif

                            @foreach ($edit_client_order->managements as $key => $manage)
                                @if ($manage->type == 'director')
                                    <table>
                                        <tbody class="directorTable">
                                            <tr>
                                                <td>
                                                    <label for="">First Name</label>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control"
                                                            name="{{ $manage->type }}[{{ $key }}][first_name]"
                                                            value="{{ $manage->first_name }}">
                                                    </div>
                                                </td>
                                                <td>
                                                    <label for="">Last Name</label>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control"
                                                            name="{{ $manage->type }}[{{ $key }}][last_name]"
                                                            value="{{ $manage->last_name }}">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="">Address To Record With The State</label>

                                                        <select
                                                            name="{{ $manage->type }}[{{ $key }}][address_selector]"
                                                            class="form-control addres_appended">
                                                            <option value="default"
                                                                {{ $manage->address_to_record_with_state == 'default' ? 'selected' : '' }}>
                                                                Our Registered Agent Address</option>
                                                            <option value="specifics"
                                                                {{ $manage->address_to_record_with_state != 'default' ? 'selected' : '' }}>
                                                                Specify Address</option>
                                                        </select>

                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="text"
                                                        name="{{ $manage->type }}[{{ $key }}][address]"
                                                        class="address_direc form-control"
                                                        placeholder="Your Address here..." style="display: none;"
                                                        value="{{ $manage->address_to_record_with_state }}">
                                                </td>
                                            </tr>


                                        </tbody>
                                    </table>
                                @else
                                    <table>
                                        <tbody class="member_or_manager_table">
                                            <tr>
                                                <td>
                                                    <label for="">First Name</label>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control"
                                                            name="{{ $manage->type }}[{{ $key }}][first_name]"
                                                            value="{{ $manage->first_name }}">
                                                    </div>
                                                </td>
                                                <td>
                                                    <label for="">Last Name</label>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control"
                                                            name="{{ $manage->type }}[{{ $key }}][last_name]"
                                                            value="{{ $manage->last_name }}">
                                                    </div>
                                                </td>
                                                <td>
                                                    <select
                                                        name="{{ $manage->type }}[{{ $key }}][address_selector]"
                                                        class="form-control addres_appended_member">
                                                        <option value="default"
                                                            {{ $manage->address_to_record_with_state == 'default' ? 'selected' : '' }}>
                                                            Our Registered Agent Address</option>
                                                        <option value="specifics"
                                                            {{ $manage->address_to_record_with_state != 'default' ? 'selected' : '' }}>
                                                            Specify Address</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="text"
                                                        name="{{ $manage->type }}[{{ $key }}][address]"
                                                        class="address_mem form-control"
                                                        placeholder="Your Address here..." style="display: none;"
                                                        value="{{ $manage->address_to_record_with_state }}">
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                    {{-- <hr> --}}
                                @endif
                            @endforeach

                            <table id="mmTable">
                                <tbody class="addNewMemManag">

                                </tbody>
                            </table>

                            {{-- each loop for director end --}}

                        @endif


                        @if ($edit_client_order->agentrenewal)
                            <h4>Enter Assets Located In Wyoming</h4>
                            <div class="row mb-3 company">
                                <div class="col-md-3">
                                    <label for="">Cash</label>
                                    <input type="number" name="cash" id="cash" class="form-control"
                                        value="{{ $edit_client_order->agentrenewal->cash }}" placeholder="Cash">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Trade Notes & Accounts Receivable</label>
                                    <input type="number" name="tradeNotesInput" id="tradeNotesInput"
                                        value="{{ $edit_client_order->agentrenewal->tradeNotesInput }}"
                                        class="form-control" placeholder="$0">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Subtract Allowance For Bad Debts</label>
                                    <input type="number" id="allowanceInput" name="allowanceInput" class="form-control"
                                        value="{{ $edit_client_order->agentrenewal->allowanceInput }}" placeholder="$0">
                                </div>
                                <div class="col-md-3">
                                    <label for="">(Accounts Receivable - Bed Debts)</label>
                                    <input type="text" id="accountsReceivable" name="accountsReceivable"
                                        class="form-control" placeholder="$0"
                                        value="{{ $edit_client_order->agentrenewal->accountsReceivable }}" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label for="">U.S Government Obligations</label>
                                    <input type="number" id="governmentObligations" name="governmentObligations"
                                        class="form-control"
                                        value="{{ $edit_client_order->agentrenewal->governmentObligations }}"
                                        placeholder="$0">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Tax-Exempt Securities</label>
                                    <input type="text" id="securities" name="securities" class="form-control"
                                        placeholder="$0" value="{{ $edit_client_order->agentrenewal->securities }}">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Other Current Assets</label>
                                    <input type="number" id="currentAssets" name="currentAssets" class="form-control"
                                        value="{{ $edit_client_order->agentrenewal->currentAssets }}" placeholder="$0">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Loans to Stockholders</label>
                                    <input type="number" id="loans" name="loans" class="form-control"
                                        value="{{ $edit_client_order->agentrenewal->loans }}" placeholder="$0">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Mortgage & Real Estate Loans</label>
                                    <input type="number" id="mortgage" name="mortgage" class="form-control"
                                        value="{{ $edit_client_order->agentrenewal->mortgage ?? '' }}" placeholder="$0">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Other Investments</label>
                                    <input type="number" id="otherInvestments" name="otherInvestments"
                                        class="form-control"
                                        value="{{ $edit_client_order->agentrenewal->otherInvestments ?? '' }}"
                                        placeholder="$0">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Buildings & Other Depreciable Tangible Assets</label>
                                    <input type="number" id="buildings" name="buildings" class="form-control"
                                        value="{{ $edit_client_order->agentrenewal->buildings ?? '' }}"
                                        placeholder="$0">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Depietable Assets</label>
                                    <input type="number" id="depietableAssets" name="depietableAssets"
                                        class="form-control"
                                        value="{{ $edit_client_order->agentrenewal->depietableAssets ?? '' }}"
                                        placeholder="$0">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Land</label>
                                    <input type="number" id="land" name="land" class="form-control"
                                        value="{{ $edit_client_order->agentrenewal->land ?? '' }}" placeholder="$0">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Intangible Assets</label>
                                    <input type="number" id="intangibleAssets" name="intangibleAssets"
                                        class="form-control"
                                        value="{{ $edit_client_order->agentrenewal->intangibleAssets ?? '' }}"
                                        placeholder="$0">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Accumulated Amortization</label>
                                    <input type="number" id="accumulatedAmortization" name="accumulatedAmortization"
                                        class="form-control"
                                        value="{{ $edit_client_order->agentrenewal->accumulatedAmortization ?? '' }}"
                                        placeholder="$0">
                                </div>
                                <div class="col-md-3">
                                    <label for="">(Intangible Assets - Accumulated Amortization)</label>
                                    <input type="text" id="intangibleAmortization" name="intangibleAmortization"
                                        class="form-control" data=""
                                        value="{{ $edit_client_order->agentrenewal->intangibleAmortization ?? '' }}"
                                        placeholder="$0" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Other Assets</label>
                                    <input type="number" id="otherAssets" name="otherAssets" class="form-control"
                                        value="{{ $edit_client_order->agentrenewal->otherAssets ?? '' }}"
                                        placeholder="$0">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Total Assets Value For Computing Tax</label>
                                    <input type="text" id="totalAssetsValue" name="totalAssetsValue"
                                        class="form-control"
                                        value="{{ $edit_client_order->agentrenewal->totalAssetsValue ?? '' }}"
                                        placeholder="$0" readonly>
                                </div>
                            </div>
                        @endif


                        <button type="submit" class="btn btn-default pull-right"
                            style="background: #557D60; color: white;">Save Changes</button>
                        {{ Form::close() }}
                        <!--end::Form-->
                    </div>
                </div>
                <!--end::Card-->

            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
@endsection
@section('scripts')


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

@endsection

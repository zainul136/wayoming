@extends('client.layouts.master')
@section('title', $title)
@section('content')

    <style>
        .p_p {
            font-weight: 800;
        }
    </style>

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Card-->
                <div class="card card-custom card-sticky" id="kt_page_sticky_card">
                    <div class="card-header" style="">
                        <div class="card-title">
                            {{-- <h3 class="card-label">Order Details
                            <i class="mr-2"></i>
                        </h3> --}}

                        </div>
                        <div class="d-print-none card-toolbar">
                            <button class="btn btn-default" data-toggle="modal" data-target="#editProfielModal"
                                style="background: #557D60; color: white;"><i class="ki ki-pencil icon-sm"
                                    style="color: white;"></i>Edit</button>

                            {{-- <a href="" class="btn btn-primary font-weight-bolder ml-2" data-toggle="modal"
                            data-target="#orderDocumentModel">
                            <span class="svg-icon svg-icon-md">
                            </span>Upload Document
                        </a> --}}





                        </div>
                    </div>
                    <div class="card-body">
                        @include('admin.partials._messages')
                        <!--begin::Form-->
                        <form action="" method="POST">

                            <h3 class="card-label">Profile</h3>

                            <div style="border: 1px solid #c5c4c4; border-radius: 10px; padding: 12px;margin: 25px 0px;">

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="row" id="second_row">
                                            <div class="col-md-4">
                                                <p class="p_p">Name</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p class="align-right">{{ Auth::user()->name ?? '' }}</p>
                                            </div>
                                            <div class="col-md-4"></div>


                                            <div class="col-md-4">
                                                <p class="p_p">Phone</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p class="align-right">{{ Auth::user()->phone ?? '' }}</p>
                                            </div>
                                            <div class="col-md-4"></div>

                                            <div class="col-md-4">
                                                <p class="p_p">Country</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p class="align-right">{{ Auth::user()->country ?? '' }}</p>
                                            </div>
                                            <div class="col-md-4"></div>

                                            <div class="col-md-4">
                                                <p class="p_p">State/Province</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p class="align-right">{{ Auth::user()->state_province ?? '' }}</p>
                                            </div>
                                            <div class="col-md-4"></div>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row" id="second_row">
                                            <div class="col-md-4">
                                                <p class="p_p">Email</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p class="align-right">{{ Auth::user()->email ?? '' }}</p>
                                            </div>
                                            <div class="col-md-4"></div>

                                            <div class="col-md-4">
                                                <p class="p_p">Address</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p class="align-right">{{ Auth::user()->address ?? '' }}</p>
                                            </div>
                                            <div class="col-md-4"></div>

                                            <div class="col-md-4">
                                                <p class="p_p">City</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p class="align-right">{{ Auth::user()->city ?? '' }}</p>
                                            </div>
                                            <div class="col-md-4"></div>

                                        </div>
                                    </div>
                                </div>

                            </div>


                        </form>
                        <!--end::Form-->
                    </div>
                </div>
                <!--end::Card-->

            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>


    <!-- Profiel Modal -->
    <div class="modal fade" id="editProfielModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ Auth::user()->name ?? '' }} Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('client.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ Auth::user()->name ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" name="email" class="form-control" value="{{ Auth::user()->email ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="text" name="phone" class="form-control" value="{{ Auth::user()->phone ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Country</label>
                                    <select class="form-control" name="country">
                                        <option value="" selected disabled>Choose country</option>
                                        <option value="AF"
                                            {{ Auth::user()->country == 'AF' ? 'selected' : '' }}>Afghanistan
                                        </option>
                                        <option value="AX"
                                            {{ Auth::user()->country == 'AX' ? 'selected' : '' }}>Åland</option>
                                        <option value="AL"
                                            {{ Auth::user()->country == 'AL' ? 'selected' : '' }}>Albania</option>
                                        <option value="DZ"
                                            {{ Auth::user()->country == 'DZ' ? 'selected' : '' }}>Algeria</option>
                                        <option value="AS"
                                            {{ Auth::user()->country == 'AS' ? 'selected' : '' }}>American Samoa
                                        </option>
                                        <option value="AD"
                                            {{ Auth::user()->country == 'AD' ? 'selected' : '' }}>Andorra</option>
                                        <option value="AO"
                                            {{ Auth::user()->country == 'AO' ? 'selected' : '' }}>Angola</option>
                                        <option value="AI"
                                            {{ Auth::user()->country == 'AI' ? 'selected' : '' }}>Anguilla</option>
                                        <option value="AQ"
                                            {{ Auth::user()->country == 'AQ' ? 'selected' : '' }}>Antarctica</option>
                                        <option value="AG"
                                            {{ Auth::user()->country == 'AG' ? 'selected' : '' }}>Antigua and Barbuda
                                        </option>
                                        <option value="AR"
                                            {{ Auth::user()->country == 'AR' ? 'selected' : '' }}>Argentina</option>
                                        <option value="AM"
                                            {{ Auth::user()->country == 'AM' ? 'selected' : '' }}>Armenia</option>
                                        <option value="AW"
                                            {{ Auth::user()->country == 'AW' ? 'selected' : '' }}>Aruba</option>
                                        <option value="AU"
                                            {{ Auth::user()->country == 'AU' ? 'selected' : '' }}>Australia</option>
                                        <option value="AT"
                                            {{ Auth::user()->country == 'AT' ? 'selected' : '' }}>Austria</option>
                                        <option value="AZ"
                                            {{ Auth::user()->country == 'AZ' ? 'selected' : '' }}>Azerbaijan</option>
                                        <option value="BS"
                                            {{ Auth::user()->country == 'BS' ? 'selected' : '' }}>Bahamas</option>
                                        <option value="BH"
                                            {{ Auth::user()->country == 'BH' ? 'selected' : '' }}>Bahrain</option>
                                        <option value="BD"
                                            {{ Auth::user()->country == 'BD' ? 'selected' : '' }}>Bangladesh</option>
                                        <option value="BB"
                                            {{ Auth::user()->country == 'BB' ? 'selected' : '' }}>Barbados</option>
                                        <option value="BY"
                                            {{ Auth::user()->country == 'BY' ? 'selected' : '' }}>Belarus</option>
                                        <option value="BE"
                                            {{ Auth::user()->country == 'BE' ? 'selected' : '' }}>Belgium</option>
                                        <option value="BZ"
                                            {{ Auth::user()->country == 'BZ' ? 'selected' : '' }}>Belize</option>
                                        <option value="BJ"
                                            {{ Auth::user()->country == 'BJ' ? 'selected' : '' }}>Benin</option>
                                        <option value="BM"
                                            {{ Auth::user()->country == 'BM' ? 'selected' : '' }}>Bermuda</option>
                                        <option value="BT"
                                            {{ Auth::user()->country == 'BT' ? 'selected' : '' }}>Bhutan</option>
                                        <option value="BO"
                                            {{ Auth::user()->country == 'BO' ? 'selected' : '' }}>Bolivia</option>
                                        <option value="BQ"
                                            {{ Auth::user()->country == 'BQ' ? 'selected' : '' }}>Bonaire</option>
                                        <option value="BA"
                                            {{ Auth::user()->country == 'BA' ? 'selected' : '' }}>Bosnia and
                                            Herzegovina</option>
                                        <option value="BW"
                                            {{ Auth::user()->country == 'BW' ? 'selected' : '' }}>Botswana</option>
                                        <option value="BV"
                                            {{ Auth::user()->country == 'BV' ? 'selected' : '' }}>Bouvet Island
                                        </option>
                                        <option value="BR"
                                            {{ Auth::user()->country == 'BR' ? 'selected' : '' }}>Brazil</option>
                                        <option value="IO"
                                            {{ Auth::user()->country == 'IO' ? 'selected' : '' }}>British Indian
                                            Ocean Territory</option>
                                        <option value="VG"
                                            {{ Auth::user()->country == 'VG' ? 'selected' : '' }}>British Virgin
                                            Islands</option>
                                        <option value="BN"
                                            {{ Auth::user()->country == 'BN' ? 'selected' : '' }}>Brunei</option>
                                        <option value="BG"
                                            {{ Auth::user()->country == 'BG' ? 'selected' : '' }}>Bulgaria</option>
                                        <option value="BF"
                                            {{ Auth::user()->country == 'BF' ? 'selected' : '' }}>Burkina Faso
                                        </option>
                                        <option value="BI"
                                            {{ Auth::user()->country == 'BI' ? 'selected' : '' }}>Burundi</option>
                                        <option value="KH"
                                            {{ Auth::user()->country == 'KH' ? 'selected' : '' }}>Cambodia</option>
                                        <option value="CM"
                                            {{ Auth::user()->country == 'CM' ? 'selected' : '' }}>Cameroon</option>
                                        <option value="CA"
                                            {{ Auth::user()->country == 'CA' ? 'selected' : '' }}>Canada</option>
                                        <option value="CV"
                                            {{ Auth::user()->country == 'CV' ? 'selected' : '' }}>Cape Verde</option>
                                        <option value="KY"
                                            {{ Auth::user()->country == 'KY' ? 'selected' : '' }}>Cayman Islands
                                        </option>
                                        <option value="CF"
                                            {{ Auth::user()->country == 'CF' ? 'selected' : '' }}>Central African
                                            Republic</option>
                                        <option value="TD"
                                            {{ Auth::user()->country == 'TD' ? 'selected' : '' }}>Chad</option>
                                        <option value="CL"
                                            {{ Auth::user()->country == 'CL' ? 'selected' : '' }}>Chile</option>
                                        <option value="CN"
                                            {{ Auth::user()->country == 'CN' ? 'selected' : '' }}>China</option>
                                        <option value="CX"
                                            {{ Auth::user()->country == 'CX' ? 'selected' : '' }}>Christmas Island
                                        </option>
                                        <option value="CC"
                                            {{ Auth::user()->country == 'CC' ? 'selected' : '' }}>Cocos [Keeling]
                                            Islands</option>
                                        <option value="CO"
                                            {{ Auth::user()->country == 'CO' ? 'selected' : '' }}>Colombia</option>
                                        <option value="KM"
                                            {{ Auth::user()->country == 'KM' ? 'selected' : '' }}>Comoros</option>
                                        <option value="CK"
                                            {{ Auth::user()->country == 'CK' ? 'selected' : '' }}>Cook Islands
                                        </option>
                                        <option value="CR"
                                            {{ Auth::user()->country == 'CR' ? 'selected' : '' }}>Costa Rica</option>
                                        <option value="HR"
                                            {{ Auth::user()->country == 'HR' ? 'selected' : '' }}>Croatia</option>
                                        <option value="CU"
                                            {{ Auth::user()->country == 'CU' ? 'selected' : '' }}>Cuba</option>
                                        <option value="CW"
                                            {{ Auth::user()->country == 'CW' ? 'selected' : '' }}>Curacao</option>
                                        <option value="CY"
                                            {{ Auth::user()->country == 'CY' ? 'selected' : '' }}>Cyprus</option>
                                        <option value="CZ"
                                            {{ Auth::user()->country == 'CZ' ? 'selected' : '' }}>Czech Republic
                                        </option>
                                        <option value="CD"
                                            {{ Auth::user()->country == 'CD' ? 'selected' : '' }}>Democratic Republic
                                            of the Congo</option>
                                        <option value="DK"
                                            {{ Auth::user()->country == 'DK' ? 'selected' : '' }}>Denmark</option>
                                        <option value="DJ"
                                            {{ Auth::user()->country == 'DJ' ? 'selected' : '' }}>Djibouti</option>
                                        <option value="DM"
                                            {{ Auth::user()->country == 'DM' ? 'selected' : '' }}>Dominica</option>
                                        <option value="DO"
                                            {{ Auth::user()->country == 'DO' ? 'selected' : '' }}>Dominican Republic
                                        </option>
                                        <option value="TL"
                                            {{ Auth::user()->country == 'TL' ? 'selected' : '' }}>East Timor</option>
                                        <option value="EC"
                                            {{ Auth::user()->country == 'EC' ? 'selected' : '' }}>Ecuador</option>
                                        <option value="EG"
                                            {{ Auth::user()->country == 'EG' ? 'selected' : '' }}>Egypt</option>
                                        <option value="SV"
                                            {{ Auth::user()->country == 'SV' ? 'selected' : '' }}>El Salvador
                                        </option>
                                        <option value="GQ"
                                            {{ Auth::user()->country == 'GQ' ? 'selected' : '' }}>Equatorial Guinea
                                        </option>
                                        <option value="ER"
                                            {{ Auth::user()->country == 'ER' ? 'selected' : '' }}>Eritrea</option>
                                        <option value="EE"
                                            {{ Auth::user()->country == 'EE' ? 'selected' : '' }}>Estonia</option>
                                        <option value="ET"
                                            {{ Auth::user()->country == 'ET' ? 'selected' : '' }}>Ethiopia</option>
                                        <option value="FK"
                                            {{ Auth::user()->country == 'FK' ? 'selected' : '' }}>Falkland Islands
                                        </option>
                                        <option value="FO"
                                            {{ Auth::user()->country == 'FO' ? 'selected' : '' }}>Faroe Islands
                                        </option>
                                        <option value="FJ"
                                            {{ Auth::user()->country == 'FJ' ? 'selected' : '' }}>Fiji</option>
                                        <option value="FI"
                                            {{ Auth::user()->country == 'FI' ? 'selected' : '' }}>Finland</option>
                                        <option value="FR"
                                            {{ Auth::user()->country == 'FR' ? 'selected' : '' }}>France</option>
                                        <option value="GF"
                                            {{ Auth::user()->country == 'GF' ? 'selected' : '' }}>French Guiana
                                        </option>
                                        <option value="PF"
                                            {{ Auth::user()->country == 'PF' ? 'selected' : '' }}>French Polynesia
                                        </option>
                                        <option value="TF"
                                            {{ Auth::user()->country == 'TF' ? 'selected' : '' }}>French Southern
                                            Territories</option>
                                        <option value="GA"
                                            {{ Auth::user()->country == 'GA' ? 'selected' : '' }}>Gabon</option>
                                        <option value="GM"
                                            {{ Auth::user()->country == 'GM' ? 'selected' : '' }}>Gambia</option>

                                        <option value="GE"
                                            {{ Auth::user()->country == 'GE' ? 'selected' : '' }}>Georgia</option>
                                        <option value="DE"
                                            {{ Auth::user()->country == 'DE' ? 'selected' : '' }}>Germany</option>
                                        <option value="GH"
                                            {{ Auth::user()->country == 'GH' ? 'selected' : '' }}>Ghana</option>
                                        <option value="GI"
                                            {{ Auth::user()->country == 'GI' ? 'selected' : '' }}>Gibraltar</option>
                                        <option value="GR"
                                            {{ Auth::user()->country == 'GR' ? 'selected' : '' }}>Greece</option>
                                        <option value="GL"
                                            {{ Auth::user()->country == 'GL' ? 'selected' : '' }}>Greenland</option>
                                        <option value="GD"
                                            {{ Auth::user()->country == 'GD' ? 'selected' : '' }}>Grenada</option>
                                        <option value="GP"
                                            {{ Auth::user()->country == 'GP' ? 'selected' : '' }}>Guadeloupe
                                        </option>
                                        <option value="GU"
                                            {{ Auth::user()->country == 'GU' ? 'selected' : '' }}>Guam</option>
                                        <option value="GT"
                                            {{ Auth::user()->country == 'GT' ? 'selected' : '' }}>Guatemala</option>
                                        <option value="GG"
                                            {{ Auth::user()->country == 'GG' ? 'selected' : '' }}>Guernsey</option>
                                        <option value="GN"
                                            {{ Auth::user()->country == 'GN' ? 'selected' : '' }}>Guinea</option>
                                        <option value="GW"
                                            {{ Auth::user()->country == 'GW' ? 'selected' : '' }}>Guinea-Bissau
                                        </option>
                                        <option value="GY"
                                            {{ Auth::user()->country == 'GY' ? 'selected' : '' }}>Guyana</option>
                                        <option value="HT"
                                            {{ Auth::user()->country == 'HT' ? 'selected' : '' }}>Haiti</option>
                                        <option value="HM"
                                            {{ Auth::user()->country == 'HM' ? 'selected' : '' }}>Heard Island and
                                            McDonald Islands</option>
                                        <option value="HN"
                                            {{ Auth::user()->country == 'HN' ? 'selected' : '' }}>Honduras</option>
                                        <option value="HK"
                                            {{ Auth::user()->country == 'HK' ? 'selected' : '' }}>Hong Kong</option>
                                        <option value="HU"
                                            {{ Auth::user()->country == 'HU' ? 'selected' : '' }}>Hungary</option>
                                        <option value="IS"
                                            {{ Auth::user()->country == 'IS' ? 'selected' : '' }}>Iceland</option>
                                        <option value="IN"
                                            {{ Auth::user()->country == 'IN' ? 'selected' : '' }}>India</option>
                                        <option value="ID"
                                            {{ Auth::user()->country == 'ID' ? 'selected' : '' }}>Indonesia</option>
                                        <option value="IR"
                                            {{ Auth::user()->country == 'IR' ? 'selected' : '' }}>Iran</option>
                                        <option value="IQ"
                                            {{ Auth::user()->country == 'IQ' ? 'selected' : '' }}>Iraq</option>
                                        <option value="IE"
                                            {{ Auth::user()->country == 'IE' ? 'selected' : '' }}>Ireland</option>
                                        <option value="IM"
                                            {{ Auth::user()->country == 'IM' ? 'selected' : '' }}>Isle of Man
                                        </option>
                                        <option value="IL"
                                            {{ Auth::user()->country == 'IL' ? 'selected' : '' }}>Israel</option>
                                        <option value="IT"
                                            {{ Auth::user()->country == 'IT' ? 'selected' : '' }}>Italy</option>
                                        <option value="CI"
                                            {{ Auth::user()->country == 'CI' ? 'selected' : '' }}>Ivory Coast
                                        </option>
                                        <option value="JM"
                                            {{ Auth::user()->country == 'JM' ? 'selected' : '' }}>Jamaica</option>
                                        <option value="JP"
                                            {{ Auth::user()->country == 'JP' ? 'selected' : '' }}>Japan</option>
                                        <option value="JE"
                                            {{ Auth::user()->country == 'JE' ? 'selected' : '' }}>Jersey</option>
                                        <option value="JO"
                                            {{ Auth::user()->country == 'JO' ? 'selected' : '' }}>Jordan</option>
                                        <option value="KZ"
                                            {{ Auth::user()->country == 'KZ' ? 'selected' : '' }}>Kazakhstan
                                        </option>
                                        <option value="KE"
                                            {{ Auth::user()->country == 'KE' ? 'selected' : '' }}>Kenya</option>
                                        <option value="KI"
                                            {{ Auth::user()->country == 'KI' ? 'selected' : '' }}>Kiribati</option>
                                        <option value="XK"
                                            {{ Auth::user()->country == 'XK' ? 'selected' : '' }}>Kosovo</option>
                                        <option value="KW"
                                            {{ Auth::user()->country == 'KW' ? 'selected' : '' }}>Kuwait</option>
                                        <option value="KG"
                                            {{ Auth::user()->country == 'KG' ? 'selected' : '' }}>Kyrgyzstan
                                        </option>
                                        <option value="LA"
                                            {{ Auth::user()->country == 'LA' ? 'selected' : '' }}>Laos</option>
                                        <option value="LV"
                                            {{ Auth::user()->country == 'LV' ? 'selected' : '' }}>Latvia</option>
                                        <option value="LB"
                                            {{ Auth::user()->country == 'LB' ? 'selected' : '' }}>Lebanon</option>
                                        <option value="LS"
                                            {{ Auth::user()->country == 'LS' ? 'selected' : '' }}>Lesotho</option>
                                        <option value="LR"
                                            {{ Auth::user()->country == 'LR' ? 'selected' : '' }}>Liberia</option>
                                        <option value="LY"
                                            {{ Auth::user()->country == 'LY' ? 'selected' : '' }}>Libya</option>
                                        <option value="LI"
                                            {{ Auth::user()->country == 'LI' ? 'selected' : '' }}>Liechtenstein
                                        </option>
                                        <option value="LT"
                                            {{ Auth::user()->country == 'LT' ? 'selected' : '' }}>Lithuania</option>
                                        <option value="LU"
                                            {{ Auth::user()->country == 'LU' ? 'selected' : '' }}>Luxembourg
                                        </option>
                                        <option value="MO"
                                            {{ Auth::user()->country == 'MO' ? 'selected' : '' }}>Macao</option>
                                        <option value="MK"
                                            {{ Auth::user()->country == 'MK' ? 'selected' : '' }}>Macedonia</option>
                                        <option value="MG"
                                            {{ Auth::user()->country == 'MG' ? 'selected' : '' }}>Madagascar
                                        </option>
                                        <option value="MW"
                                            {{ Auth::user()->country == 'MW' ? 'selected' : '' }}>Malawi</option>
                                        <option value="MY"
                                            {{ Auth::user()->country == 'MY' ? 'selected' : '' }}>Malaysia</option>
                                        <option value="MV"
                                            {{ Auth::user()->country == 'MV' ? 'selected' : '' }}>Maldives</option>
                                        <option value="ML"
                                            {{ Auth::user()->country == 'ML' ? 'selected' : '' }}>Mali</option>
                                        <option value="MT"
                                            {{ Auth::user()->country == 'MT' ? 'selected' : '' }}>Malta</option>
                                        <option value="MH"
                                            {{ Auth::user()->country == 'MH' ? 'selected' : '' }}>Marshall Islands
                                        </option>
                                        <option value="MQ"
                                            {{ Auth::user()->country == 'MQ' ? 'selected' : '' }}>Martinique
                                        </option>
                                        <option value="MR"
                                            {{ Auth::user()->country == 'MR' ? 'selected' : '' }}>Mauritania
                                        </option>
                                        <option value="MU"
                                            {{ Auth::user()->country == 'MU' ? 'selected' : '' }}>Mauritius</option>
                                        <option value="YT"
                                            {{ Auth::user()->country == 'YT' ? 'selected' : '' }}>Mayotte</option>
                                        <option value="MX"
                                            {{ Auth::user()->country == 'MX' ? 'selected' : '' }}>Mexico</option>
                                        <option value="FM"
                                            {{ Auth::user()->country == 'FM' ? 'selected' : '' }}>Micronesia
                                        </option>
                                        <option value="MD"
                                            {{ Auth::user()->country == 'MD' ? 'selected' : '' }}>Moldova</option>
                                        <option value="MC"
                                            {{ Auth::user()->country == 'MC' ? 'selected' : '' }}>Monaco</option>
                                        <option value="MN"
                                            {{ Auth::user()->country == 'MN' ? 'selected' : '' }}>Mongolia</option>
                                        <option value="ME"
                                            {{ Auth::user()->country == 'ME' ? 'selected' : '' }}>Montenegro
                                        </option>
                                        <option value="MS"
                                            {{ Auth::user()->country == 'MS' ? 'selected' : '' }}>Montserrat
                                        </option>
                                        <option value="MA"
                                            {{ Auth::user()->country == 'MA' ? 'selected' : '' }}>Morocco</option>
                                        <option value="MZ"
                                            {{ Auth::user()->country == 'MZ' ? 'selected' : '' }}>Mozambique
                                        </option>
                                        <option value="MM"
                                            {{ Auth::user()->country == 'MM' ? 'selected' : '' }}>Myanmar [Burma]
                                        </option>
                                        <option value="NA"
                                            {{ Auth::user()->country == 'NA' ? 'selected' : '' }}>Namibia</option>
                                        <option value="NR"
                                            {{ Auth::user()->country == 'NR' ? 'selected' : '' }}>Nauru</option>
                                        <option value="NP"
                                            {{ Auth::user()->country == 'NP' ? 'selected' : '' }}>Nepal</option>
                                        <option value="NL"
                                            {{ Auth::user()->country == 'NL' ? 'selected' : '' }}>Netherlands
                                        </option>
                                        <option value="NC"
                                            {{ Auth::user()->country == 'NC' ? 'selected' : '' }}>New Caledonia
                                        </option>
                                        <option value="NZ"
                                            {{ Auth::user()->country == 'NZ' ? 'selected' : '' }}>New Zealand
                                        </option>
                                        <option value="NI"
                                            {{ Auth::user()->country == 'NI' ? 'selected' : '' }}>Nicaragua</option>
                                        <option value="NE"
                                            {{ Auth::user()->country == 'NE' ? 'selected' : '' }}>Niger</option>
                                        <option value="NG"
                                            {{ Auth::user()->country == 'NG' ? 'selected' : '' }}>Nigeria</option>
                                        <option value="NU"
                                            {{ Auth::user()->country == 'NU' ? 'selected' : '' }}>Niue</option>
                                        <option value="NF"
                                            {{ Auth::user()->country == 'NF' ? 'selected' : '' }}>Norfolk Island
                                        </option>
                                        <option value="KP"
                                            {{ Auth::user()->country == 'KP' ? 'selected' : '' }}>North Korea
                                        </option>
                                        <option value="MP"
                                            {{ Auth::user()->country == 'MP' ? 'selected' : '' }}>Northern Mariana
                                            Islands</option>
                                        <option value="NO"
                                            {{ Auth::user()->country == 'NO' ? 'selected' : '' }}>Norway</option>
                                        <option value="OM"
                                            {{ Auth::user()->country == 'OM' ? 'selected' : '' }}>Oman</option>
                                        <option value="PK"
                                            {{ Auth::user()->country == 'PK' ? 'selected' : '' }}>Pakistan</option>
                                        <option value="PW"
                                            {{ Auth::user()->country == 'PW' ? 'selected' : '' }}>Palau</option>
                                        <option value="PS"
                                            {{ Auth::user()->country == 'PS' ? 'selected' : '' }}>Palestine</option>
                                        <option value="PA"
                                            {{ Auth::user()->country == 'PA' ? 'selected' : '' }}>Panama</option>
                                        <option value="PG"
                                            {{ Auth::user()->country == 'PG' ? 'selected' : '' }}>Papua New Guinea
                                        </option>
                                        <option value="PY"
                                            {{ Auth::user()->country == 'PY' ? 'selected' : '' }}>Paraguay</option>
                                        <option value="PE"
                                            {{ Auth::user()->country == 'PE' ? 'selected' : '' }}>Peru</option>
                                        <option value="PH"
                                            {{ Auth::user()->country == 'PH' ? 'selected' : '' }}>Philippines
                                        </option>
                                        <option value="PN"
                                            {{ Auth::user()->country == 'PN' ? 'selected' : '' }}>Pitcairn Islands
                                        </option>
                                        <option value="PL"
                                            {{ Auth::user()->country == 'PL' ? 'selected' : '' }}>Poland</option>
                                        <option value="PT"
                                            {{ Auth::user()->country == 'PT' ? 'selected' : '' }}>Portugal</option>
                                        <option value="PR"
                                            {{ Auth::user()->country == 'PR' ? 'selected' : '' }}>Puerto Rico
                                        </option>
                                        <option value="QA"
                                            {{ Auth::user()->country == 'QA' ? 'selected' : '' }}>Qatar</option>
                                        <option value="CG"
                                            {{ Auth::user()->country == 'CG' ? 'selected' : '' }}>Republic of the
                                            Congo</option>
                                        <option value="RE"
                                            {{ Auth::user()->country == 'RE' ? 'selected' : '' }}>Réunion</option>
                                        <option value="RO"
                                            {{ Auth::user()->country == 'RO' ? 'selected' : '' }}>Romania</option>
                                        <option value="RU"
                                            {{ Auth::user()->country == 'RU' ? 'selected' : '' }}>Russia</option>
                                        <option value="RW"
                                            {{ Auth::user()->country == 'RW' ? 'selected' : '' }}>Rwanda</option>
                                        <option value="BL"
                                            {{ Auth::user()->country == 'BL' ? 'selected' : '' }}>Saint Barthélemy
                                        </option>
                                        <option value="SH"
                                            {{ Auth::user()->country == 'SH' ? 'selected' : '' }}>Saint Helena
                                        </option>
                                        <option value="KN"
                                            {{ Auth::user()->country == 'KN' ? 'selected' : '' }}>Saint Kitts and
                                            Nevis</option>
                                        <option value="LC"
                                            {{ Auth::user()->country == 'LC' ? 'selected' : '' }}>Saint Lucia
                                        </option>
                                        <option value="MF"
                                            {{ Auth::user()->country == 'MF' ? 'selected' : '' }}>Saint Martin
                                        </option>
                                        <option value="PM"
                                            {{ Auth::user()->country == 'PM' ? 'selected' : '' }}>Saint Pierre and
                                            Miquelon</option>
                                        <option value="VC"
                                            {{ Auth::user()->country == 'VC' ? 'selected' : '' }}>Saint Vincent and
                                            the Grenadines</option>
                                        <option value="WS"
                                            {{ Auth::user()->country == 'WS' ? 'selected' : '' }}>Samoa</option>
                                        <option value="SM"
                                            {{ Auth::user()->country == 'SM' ? 'selected' : '' }}>San Marino
                                        </option>
                                        <option value="ST"
                                            {{ Auth::user()->country == 'ST' ? 'selected' : '' }}>São Tomé and
                                            Príncipe</option>
                                        <option value="SA"
                                            {{ Auth::user()->country == 'SA' ? 'selected' : '' }}>Saudi Arabia
                                        </option>
                                        <option value="SN"
                                            {{ Auth::user()->country == 'SN' ? 'selected' : '' }}>Senegal</option>
                                        <option value="RS"
                                            {{ Auth::user()->country == 'RS' ? 'selected' : '' }}>Serbia</option>
                                        <option value="SC"
                                            {{ Auth::user()->country == 'SC' ? 'selected' : '' }}>Seychelles
                                        </option>
                                        <option value="SL"
                                            {{ Auth::user()->country == 'SL' ? 'selected' : '' }}>Sierra Leone
                                        </option>
                                        <option value="SG"
                                            {{ Auth::user()->country == 'SG' ? 'selected' : '' }}>Singapore</option>
                                        <option value="SX"
                                            {{ Auth::user()->country == 'SX' ? 'selected' : '' }}>Sint Maarten
                                        </option>
                                        <option value="SK"
                                            {{ Auth::user()->country == 'SK' ? 'selected' : '' }}>Slovakia</option>
                                        <option value="SI"
                                            {{ Auth::user()->country == 'SI' ? 'selected' : '' }}>Slovenia</option>
                                        <option value="SB"
                                            {{ Auth::user()->country == 'SB' ? 'selected' : '' }}>Solomon Islands
                                        </option>
                                        <option value="SO"
                                            {{ Auth::user()->country == 'SO' ? 'selected' : '' }}>Somalia</option>
                                        <option value="ZA"
                                            {{ Auth::user()->country == 'ZA' ? 'selected' : '' }}>South Africa
                                        </option>
                                        <option value="GS"
                                            {{ Auth::user()->country == 'GS' ? 'selected' : '' }}>South Georgia and
                                            the South Sandwich Islands</option>
                                        <option value="KR"
                                            {{ Auth::user()->country == 'KR' ? 'selected' : '' }}>South Korea
                                        </option>
                                        <option value="SS"
                                            {{ Auth::user()->country == 'SS' ? 'selected' : '' }}>South Sudan
                                        </option>
                                        <option value="ES"
                                            {{ Auth::user()->country == 'ES' ? 'selected' : '' }}>Spain</option>
                                        <option value="LK"
                                            {{ Auth::user()->country == 'LK' ? 'selected' : '' }}>Sri Lanka</option>
                                        <option value="SD"
                                            {{ Auth::user()->country == 'SD' ? 'selected' : '' }}>Sudan</option>
                                        <option value="SR"
                                            {{ Auth::user()->country == 'SR' ? 'selected' : '' }}>Suriname</option>
                                        <option value="SJ"
                                            {{ Auth::user()->country == 'SJ' ? 'selected' : '' }}>Svalbard and Jan
                                            Mayen</option>
                                        <option value="SZ"
                                            {{ Auth::user()->country == 'SZ' ? 'selected' : '' }}>Swaziland</option>
                                        <option value="SE"
                                            {{ Auth::user()->country == 'SE' ? 'selected' : '' }}>Sweden</option>
                                        <option value="CH"
                                            {{ Auth::user()->country == 'CH' ? 'selected' : '' }}>Switzerland
                                        </option>
                                        <option value="SY"
                                            {{ Auth::user()->country == 'SY' ? 'selected' : '' }}>Syria</option>
                                        <option value="TW"
                                            {{ Auth::user()->country == 'TW' ? 'selected' : '' }}>Taiwan</option>
                                        <option value="TJ"
                                            {{ Auth::user()->country == 'TJ' ? 'selected' : '' }}>Tajikistan
                                        </option>
                                        <option value="TZ"
                                            {{ Auth::user()->country == 'TZ' ? 'selected' : '' }}>Tanzania</option>
                                        <option value="TH"
                                            {{ Auth::user()->country == 'TH' ? 'selected' : '' }}>Thailand</option>
                                        <option value="TG"
                                            {{ Auth::user()->country == 'TG' ? 'selected' : '' }}>Togo</option>
                                        <option value="TK"
                                            {{ Auth::user()->country == 'TK' ? 'selected' : '' }}>Tokelau</option>
                                        <option value="TO"
                                            {{ Auth::user()->country == 'TO' ? 'selected' : '' }}>Tonga</option>
                                        <option value="TT"
                                            {{ Auth::user()->country == 'TT' ? 'selected' : '' }}>Trinidad and
                                            Tobago</option>
                                        <option value="TN"
                                            {{ Auth::user()->country == 'TN' ? 'selected' : '' }}>Tunisia</option>
                                        <option value="TR"
                                            {{ Auth::user()->country == 'TR' ? 'selected' : '' }}>Turkey</option>
                                        <option value="TM"
                                            {{ Auth::user()->country == 'TM' ? 'selected' : '' }}>Turkmenistan
                                        </option>
                                        <option value="TC"
                                            {{ Auth::user()->country == 'TC' ? 'selected' : '' }}>Turks and Caicos
                                            Islands</option>
                                        <option value="TV"
                                            {{ Auth::user()->country == 'TV' ? 'selected' : '' }}>Tuvalu</option>
                                        <option value="UM"
                                            {{ Auth::user()->country == 'UM' ? 'selected' : '' }}>U.S. Minor
                                            Outlying Islands</option>
                                        <option value="VI"
                                            {{ Auth::user()->country == 'VI' ? 'selected' : '' }}>U.S. Virgin
                                            Islands</option>
                                        <option value="UG"
                                            {{ Auth::user()->country == 'UG' ? 'selected' : '' }}>Uganda</option>
                                        <option value="UA"
                                            {{ Auth::user()->country == 'UA' ? 'selected' : '' }}>Ukraine</option>
                                        <option value="AE"
                                            {{ Auth::user()->country == 'AE' ? 'selected' : '' }}>United Arab
                                            Emirates</option>
                                        <option value="GB"
                                            {{ Auth::user()->country == 'GB' ? 'selected' : '' }}>United Kingdom
                                        </option>
                                        <option value="US"
                                            {{ Auth::user()->country == 'US' ? 'selected' : '' }}>United States
                                        </option>
                                        <option value="UY"
                                            {{ Auth::user()->country == 'UY' ? 'selected' : '' }}>Uruguay</option>
                                        <option value="UZ"
                                            {{ Auth::user()->country == 'UZ' ? 'selected' : '' }}>Uzbekistan
                                        </option>
                                        <option value="VU"
                                            {{ Auth::user()->country == 'VU' ? 'selected' : '' }}>Vanuatu</option>
                                        <option value="VA"
                                            {{ Auth::user()->country == 'VA' ? 'selected' : '' }}>Vatican City
                                        </option>
                                        <option value="VE"
                                            {{ Auth::user()->country == 'VE' ? 'selected' : '' }}>Venezuela</option>
                                        <option value="VN"
                                            {{ Auth::user()->country == 'VN' ? 'selected' : '' }}>Vietnam</option>
                                        <option value="WF"
                                            {{ Auth::user()->country == 'WF' ? 'selected' : '' }}>Wallis and Futuna
                                        </option>
                                        <option value="EH"
                                            {{ Auth::user()->country == 'EH' ? 'selected' : '' }}>Western Sahara
                                        </option>
                                        <option value="YE"
                                            {{ Auth::user()->country == 'YE' ? 'selected' : '' }}>Yemen</option>
                                        <option value="ZM"
                                            {{ Auth::user()->country == 'ZM' ? 'selected' : '' }}>Zambia</option>
                                        <option value="ZW"
                                            {{ Auth::user()->country == 'ZW' ? 'selected' : '' }}>Zimbabwe</option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">City</label>
                                    <input type="text" name="city" class="form-control" value="{{ Auth::user()->city ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">State/Province</label>
                                    <input type="text" name="state_province" class="form-control" value="{{ Auth::user()->state_province ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Address</label>
                                    <input type="text" name="address" class="form-control" value="{{ Auth::user()->address ?? '' }}">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" style="background: #557D60; color: white; border: 0px;"
                            class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Profiel Modal -->

@endsection

@section('scripts')

    <script>
        $(document).ready(function() {

        });
    </script>

@endsection

<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>

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
                            

                        </div>
                        <div class="d-print-none card-toolbar">
                            <button class="btn btn-default" data-toggle="modal" data-target="#editProfielModal"
                                style="background: #557D60; color: white;"><i class="ki ki-pencil icon-sm"
                                    style="color: white;"></i>Edit</button>

                            





                        </div>
                    </div>
                    <div class="card-body">
                        <?php echo $__env->make('admin.partials._messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                                                <p class="align-right"><?php echo e(Auth::user()->name ?? ''); ?></p>
                                            </div>
                                            <div class="col-md-4"></div>


                                            <div class="col-md-4">
                                                <p class="p_p">Phone</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p class="align-right"><?php echo e(Auth::user()->phone ?? ''); ?></p>
                                            </div>
                                            <div class="col-md-4"></div>

                                            <div class="col-md-4">
                                                <p class="p_p">Country</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p class="align-right"><?php echo e(Auth::user()->country ?? ''); ?></p>
                                            </div>
                                            <div class="col-md-4"></div>

                                            <div class="col-md-4">
                                                <p class="p_p">State/Province</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p class="align-right"><?php echo e(Auth::user()->state_province ?? ''); ?></p>
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
                                                <p class="align-right"><?php echo e(Auth::user()->email ?? ''); ?></p>
                                            </div>
                                            <div class="col-md-4"></div>

                                            <div class="col-md-4">
                                                <p class="p_p">Address</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p class="align-right"><?php echo e(Auth::user()->address ?? ''); ?></p>
                                            </div>
                                            <div class="col-md-4"></div>

                                            <div class="col-md-4">
                                                <p class="p_p">City</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p class="align-right"><?php echo e(Auth::user()->city ?? ''); ?></p>
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
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo e(Auth::user()->name ?? ''); ?> Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo e(route('client.update')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id" value="<?php echo e(Auth::user()->id); ?>">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="name" class="form-control" value="<?php echo e(Auth::user()->name ?? ''); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" name="email" class="form-control" value="<?php echo e(Auth::user()->email ?? ''); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="text" name="phone" class="form-control" value="<?php echo e(Auth::user()->phone ?? ''); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Country</label>
                                    <select class="form-control" name="country">
                                        <option value="" selected disabled>Choose country</option>
                                        <option value="AF"
                                            <?php echo e(Auth::user()->country == 'AF' ? 'selected' : ''); ?>>Afghanistan
                                        </option>
                                        <option value="AX"
                                            <?php echo e(Auth::user()->country == 'AX' ? 'selected' : ''); ?>>Åland</option>
                                        <option value="AL"
                                            <?php echo e(Auth::user()->country == 'AL' ? 'selected' : ''); ?>>Albania</option>
                                        <option value="DZ"
                                            <?php echo e(Auth::user()->country == 'DZ' ? 'selected' : ''); ?>>Algeria</option>
                                        <option value="AS"
                                            <?php echo e(Auth::user()->country == 'AS' ? 'selected' : ''); ?>>American Samoa
                                        </option>
                                        <option value="AD"
                                            <?php echo e(Auth::user()->country == 'AD' ? 'selected' : ''); ?>>Andorra</option>
                                        <option value="AO"
                                            <?php echo e(Auth::user()->country == 'AO' ? 'selected' : ''); ?>>Angola</option>
                                        <option value="AI"
                                            <?php echo e(Auth::user()->country == 'AI' ? 'selected' : ''); ?>>Anguilla</option>
                                        <option value="AQ"
                                            <?php echo e(Auth::user()->country == 'AQ' ? 'selected' : ''); ?>>Antarctica</option>
                                        <option value="AG"
                                            <?php echo e(Auth::user()->country == 'AG' ? 'selected' : ''); ?>>Antigua and Barbuda
                                        </option>
                                        <option value="AR"
                                            <?php echo e(Auth::user()->country == 'AR' ? 'selected' : ''); ?>>Argentina</option>
                                        <option value="AM"
                                            <?php echo e(Auth::user()->country == 'AM' ? 'selected' : ''); ?>>Armenia</option>
                                        <option value="AW"
                                            <?php echo e(Auth::user()->country == 'AW' ? 'selected' : ''); ?>>Aruba</option>
                                        <option value="AU"
                                            <?php echo e(Auth::user()->country == 'AU' ? 'selected' : ''); ?>>Australia</option>
                                        <option value="AT"
                                            <?php echo e(Auth::user()->country == 'AT' ? 'selected' : ''); ?>>Austria</option>
                                        <option value="AZ"
                                            <?php echo e(Auth::user()->country == 'AZ' ? 'selected' : ''); ?>>Azerbaijan</option>
                                        <option value="BS"
                                            <?php echo e(Auth::user()->country == 'BS' ? 'selected' : ''); ?>>Bahamas</option>
                                        <option value="BH"
                                            <?php echo e(Auth::user()->country == 'BH' ? 'selected' : ''); ?>>Bahrain</option>
                                        <option value="BD"
                                            <?php echo e(Auth::user()->country == 'BD' ? 'selected' : ''); ?>>Bangladesh</option>
                                        <option value="BB"
                                            <?php echo e(Auth::user()->country == 'BB' ? 'selected' : ''); ?>>Barbados</option>
                                        <option value="BY"
                                            <?php echo e(Auth::user()->country == 'BY' ? 'selected' : ''); ?>>Belarus</option>
                                        <option value="BE"
                                            <?php echo e(Auth::user()->country == 'BE' ? 'selected' : ''); ?>>Belgium</option>
                                        <option value="BZ"
                                            <?php echo e(Auth::user()->country == 'BZ' ? 'selected' : ''); ?>>Belize</option>
                                        <option value="BJ"
                                            <?php echo e(Auth::user()->country == 'BJ' ? 'selected' : ''); ?>>Benin</option>
                                        <option value="BM"
                                            <?php echo e(Auth::user()->country == 'BM' ? 'selected' : ''); ?>>Bermuda</option>
                                        <option value="BT"
                                            <?php echo e(Auth::user()->country == 'BT' ? 'selected' : ''); ?>>Bhutan</option>
                                        <option value="BO"
                                            <?php echo e(Auth::user()->country == 'BO' ? 'selected' : ''); ?>>Bolivia</option>
                                        <option value="BQ"
                                            <?php echo e(Auth::user()->country == 'BQ' ? 'selected' : ''); ?>>Bonaire</option>
                                        <option value="BA"
                                            <?php echo e(Auth::user()->country == 'BA' ? 'selected' : ''); ?>>Bosnia and
                                            Herzegovina</option>
                                        <option value="BW"
                                            <?php echo e(Auth::user()->country == 'BW' ? 'selected' : ''); ?>>Botswana</option>
                                        <option value="BV"
                                            <?php echo e(Auth::user()->country == 'BV' ? 'selected' : ''); ?>>Bouvet Island
                                        </option>
                                        <option value="BR"
                                            <?php echo e(Auth::user()->country == 'BR' ? 'selected' : ''); ?>>Brazil</option>
                                        <option value="IO"
                                            <?php echo e(Auth::user()->country == 'IO' ? 'selected' : ''); ?>>British Indian
                                            Ocean Territory</option>
                                        <option value="VG"
                                            <?php echo e(Auth::user()->country == 'VG' ? 'selected' : ''); ?>>British Virgin
                                            Islands</option>
                                        <option value="BN"
                                            <?php echo e(Auth::user()->country == 'BN' ? 'selected' : ''); ?>>Brunei</option>
                                        <option value="BG"
                                            <?php echo e(Auth::user()->country == 'BG' ? 'selected' : ''); ?>>Bulgaria</option>
                                        <option value="BF"
                                            <?php echo e(Auth::user()->country == 'BF' ? 'selected' : ''); ?>>Burkina Faso
                                        </option>
                                        <option value="BI"
                                            <?php echo e(Auth::user()->country == 'BI' ? 'selected' : ''); ?>>Burundi</option>
                                        <option value="KH"
                                            <?php echo e(Auth::user()->country == 'KH' ? 'selected' : ''); ?>>Cambodia</option>
                                        <option value="CM"
                                            <?php echo e(Auth::user()->country == 'CM' ? 'selected' : ''); ?>>Cameroon</option>
                                        <option value="CA"
                                            <?php echo e(Auth::user()->country == 'CA' ? 'selected' : ''); ?>>Canada</option>
                                        <option value="CV"
                                            <?php echo e(Auth::user()->country == 'CV' ? 'selected' : ''); ?>>Cape Verde</option>
                                        <option value="KY"
                                            <?php echo e(Auth::user()->country == 'KY' ? 'selected' : ''); ?>>Cayman Islands
                                        </option>
                                        <option value="CF"
                                            <?php echo e(Auth::user()->country == 'CF' ? 'selected' : ''); ?>>Central African
                                            Republic</option>
                                        <option value="TD"
                                            <?php echo e(Auth::user()->country == 'TD' ? 'selected' : ''); ?>>Chad</option>
                                        <option value="CL"
                                            <?php echo e(Auth::user()->country == 'CL' ? 'selected' : ''); ?>>Chile</option>
                                        <option value="CN"
                                            <?php echo e(Auth::user()->country == 'CN' ? 'selected' : ''); ?>>China</option>
                                        <option value="CX"
                                            <?php echo e(Auth::user()->country == 'CX' ? 'selected' : ''); ?>>Christmas Island
                                        </option>
                                        <option value="CC"
                                            <?php echo e(Auth::user()->country == 'CC' ? 'selected' : ''); ?>>Cocos [Keeling]
                                            Islands</option>
                                        <option value="CO"
                                            <?php echo e(Auth::user()->country == 'CO' ? 'selected' : ''); ?>>Colombia</option>
                                        <option value="KM"
                                            <?php echo e(Auth::user()->country == 'KM' ? 'selected' : ''); ?>>Comoros</option>
                                        <option value="CK"
                                            <?php echo e(Auth::user()->country == 'CK' ? 'selected' : ''); ?>>Cook Islands
                                        </option>
                                        <option value="CR"
                                            <?php echo e(Auth::user()->country == 'CR' ? 'selected' : ''); ?>>Costa Rica</option>
                                        <option value="HR"
                                            <?php echo e(Auth::user()->country == 'HR' ? 'selected' : ''); ?>>Croatia</option>
                                        <option value="CU"
                                            <?php echo e(Auth::user()->country == 'CU' ? 'selected' : ''); ?>>Cuba</option>
                                        <option value="CW"
                                            <?php echo e(Auth::user()->country == 'CW' ? 'selected' : ''); ?>>Curacao</option>
                                        <option value="CY"
                                            <?php echo e(Auth::user()->country == 'CY' ? 'selected' : ''); ?>>Cyprus</option>
                                        <option value="CZ"
                                            <?php echo e(Auth::user()->country == 'CZ' ? 'selected' : ''); ?>>Czech Republic
                                        </option>
                                        <option value="CD"
                                            <?php echo e(Auth::user()->country == 'CD' ? 'selected' : ''); ?>>Democratic Republic
                                            of the Congo</option>
                                        <option value="DK"
                                            <?php echo e(Auth::user()->country == 'DK' ? 'selected' : ''); ?>>Denmark</option>
                                        <option value="DJ"
                                            <?php echo e(Auth::user()->country == 'DJ' ? 'selected' : ''); ?>>Djibouti</option>
                                        <option value="DM"
                                            <?php echo e(Auth::user()->country == 'DM' ? 'selected' : ''); ?>>Dominica</option>
                                        <option value="DO"
                                            <?php echo e(Auth::user()->country == 'DO' ? 'selected' : ''); ?>>Dominican Republic
                                        </option>
                                        <option value="TL"
                                            <?php echo e(Auth::user()->country == 'TL' ? 'selected' : ''); ?>>East Timor</option>
                                        <option value="EC"
                                            <?php echo e(Auth::user()->country == 'EC' ? 'selected' : ''); ?>>Ecuador</option>
                                        <option value="EG"
                                            <?php echo e(Auth::user()->country == 'EG' ? 'selected' : ''); ?>>Egypt</option>
                                        <option value="SV"
                                            <?php echo e(Auth::user()->country == 'SV' ? 'selected' : ''); ?>>El Salvador
                                        </option>
                                        <option value="GQ"
                                            <?php echo e(Auth::user()->country == 'GQ' ? 'selected' : ''); ?>>Equatorial Guinea
                                        </option>
                                        <option value="ER"
                                            <?php echo e(Auth::user()->country == 'ER' ? 'selected' : ''); ?>>Eritrea</option>
                                        <option value="EE"
                                            <?php echo e(Auth::user()->country == 'EE' ? 'selected' : ''); ?>>Estonia</option>
                                        <option value="ET"
                                            <?php echo e(Auth::user()->country == 'ET' ? 'selected' : ''); ?>>Ethiopia</option>
                                        <option value="FK"
                                            <?php echo e(Auth::user()->country == 'FK' ? 'selected' : ''); ?>>Falkland Islands
                                        </option>
                                        <option value="FO"
                                            <?php echo e(Auth::user()->country == 'FO' ? 'selected' : ''); ?>>Faroe Islands
                                        </option>
                                        <option value="FJ"
                                            <?php echo e(Auth::user()->country == 'FJ' ? 'selected' : ''); ?>>Fiji</option>
                                        <option value="FI"
                                            <?php echo e(Auth::user()->country == 'FI' ? 'selected' : ''); ?>>Finland</option>
                                        <option value="FR"
                                            <?php echo e(Auth::user()->country == 'FR' ? 'selected' : ''); ?>>France</option>
                                        <option value="GF"
                                            <?php echo e(Auth::user()->country == 'GF' ? 'selected' : ''); ?>>French Guiana
                                        </option>
                                        <option value="PF"
                                            <?php echo e(Auth::user()->country == 'PF' ? 'selected' : ''); ?>>French Polynesia
                                        </option>
                                        <option value="TF"
                                            <?php echo e(Auth::user()->country == 'TF' ? 'selected' : ''); ?>>French Southern
                                            Territories</option>
                                        <option value="GA"
                                            <?php echo e(Auth::user()->country == 'GA' ? 'selected' : ''); ?>>Gabon</option>
                                        <option value="GM"
                                            <?php echo e(Auth::user()->country == 'GM' ? 'selected' : ''); ?>>Gambia</option>

                                        <option value="GE"
                                            <?php echo e(Auth::user()->country == 'GE' ? 'selected' : ''); ?>>Georgia</option>
                                        <option value="DE"
                                            <?php echo e(Auth::user()->country == 'DE' ? 'selected' : ''); ?>>Germany</option>
                                        <option value="GH"
                                            <?php echo e(Auth::user()->country == 'GH' ? 'selected' : ''); ?>>Ghana</option>
                                        <option value="GI"
                                            <?php echo e(Auth::user()->country == 'GI' ? 'selected' : ''); ?>>Gibraltar</option>
                                        <option value="GR"
                                            <?php echo e(Auth::user()->country == 'GR' ? 'selected' : ''); ?>>Greece</option>
                                        <option value="GL"
                                            <?php echo e(Auth::user()->country == 'GL' ? 'selected' : ''); ?>>Greenland</option>
                                        <option value="GD"
                                            <?php echo e(Auth::user()->country == 'GD' ? 'selected' : ''); ?>>Grenada</option>
                                        <option value="GP"
                                            <?php echo e(Auth::user()->country == 'GP' ? 'selected' : ''); ?>>Guadeloupe
                                        </option>
                                        <option value="GU"
                                            <?php echo e(Auth::user()->country == 'GU' ? 'selected' : ''); ?>>Guam</option>
                                        <option value="GT"
                                            <?php echo e(Auth::user()->country == 'GT' ? 'selected' : ''); ?>>Guatemala</option>
                                        <option value="GG"
                                            <?php echo e(Auth::user()->country == 'GG' ? 'selected' : ''); ?>>Guernsey</option>
                                        <option value="GN"
                                            <?php echo e(Auth::user()->country == 'GN' ? 'selected' : ''); ?>>Guinea</option>
                                        <option value="GW"
                                            <?php echo e(Auth::user()->country == 'GW' ? 'selected' : ''); ?>>Guinea-Bissau
                                        </option>
                                        <option value="GY"
                                            <?php echo e(Auth::user()->country == 'GY' ? 'selected' : ''); ?>>Guyana</option>
                                        <option value="HT"
                                            <?php echo e(Auth::user()->country == 'HT' ? 'selected' : ''); ?>>Haiti</option>
                                        <option value="HM"
                                            <?php echo e(Auth::user()->country == 'HM' ? 'selected' : ''); ?>>Heard Island and
                                            McDonald Islands</option>
                                        <option value="HN"
                                            <?php echo e(Auth::user()->country == 'HN' ? 'selected' : ''); ?>>Honduras</option>
                                        <option value="HK"
                                            <?php echo e(Auth::user()->country == 'HK' ? 'selected' : ''); ?>>Hong Kong</option>
                                        <option value="HU"
                                            <?php echo e(Auth::user()->country == 'HU' ? 'selected' : ''); ?>>Hungary</option>
                                        <option value="IS"
                                            <?php echo e(Auth::user()->country == 'IS' ? 'selected' : ''); ?>>Iceland</option>
                                        <option value="IN"
                                            <?php echo e(Auth::user()->country == 'IN' ? 'selected' : ''); ?>>India</option>
                                        <option value="ID"
                                            <?php echo e(Auth::user()->country == 'ID' ? 'selected' : ''); ?>>Indonesia</option>
                                        <option value="IR"
                                            <?php echo e(Auth::user()->country == 'IR' ? 'selected' : ''); ?>>Iran</option>
                                        <option value="IQ"
                                            <?php echo e(Auth::user()->country == 'IQ' ? 'selected' : ''); ?>>Iraq</option>
                                        <option value="IE"
                                            <?php echo e(Auth::user()->country == 'IE' ? 'selected' : ''); ?>>Ireland</option>
                                        <option value="IM"
                                            <?php echo e(Auth::user()->country == 'IM' ? 'selected' : ''); ?>>Isle of Man
                                        </option>
                                        <option value="IL"
                                            <?php echo e(Auth::user()->country == 'IL' ? 'selected' : ''); ?>>Israel</option>
                                        <option value="IT"
                                            <?php echo e(Auth::user()->country == 'IT' ? 'selected' : ''); ?>>Italy</option>
                                        <option value="CI"
                                            <?php echo e(Auth::user()->country == 'CI' ? 'selected' : ''); ?>>Ivory Coast
                                        </option>
                                        <option value="JM"
                                            <?php echo e(Auth::user()->country == 'JM' ? 'selected' : ''); ?>>Jamaica</option>
                                        <option value="JP"
                                            <?php echo e(Auth::user()->country == 'JP' ? 'selected' : ''); ?>>Japan</option>
                                        <option value="JE"
                                            <?php echo e(Auth::user()->country == 'JE' ? 'selected' : ''); ?>>Jersey</option>
                                        <option value="JO"
                                            <?php echo e(Auth::user()->country == 'JO' ? 'selected' : ''); ?>>Jordan</option>
                                        <option value="KZ"
                                            <?php echo e(Auth::user()->country == 'KZ' ? 'selected' : ''); ?>>Kazakhstan
                                        </option>
                                        <option value="KE"
                                            <?php echo e(Auth::user()->country == 'KE' ? 'selected' : ''); ?>>Kenya</option>
                                        <option value="KI"
                                            <?php echo e(Auth::user()->country == 'KI' ? 'selected' : ''); ?>>Kiribati</option>
                                        <option value="XK"
                                            <?php echo e(Auth::user()->country == 'XK' ? 'selected' : ''); ?>>Kosovo</option>
                                        <option value="KW"
                                            <?php echo e(Auth::user()->country == 'KW' ? 'selected' : ''); ?>>Kuwait</option>
                                        <option value="KG"
                                            <?php echo e(Auth::user()->country == 'KG' ? 'selected' : ''); ?>>Kyrgyzstan
                                        </option>
                                        <option value="LA"
                                            <?php echo e(Auth::user()->country == 'LA' ? 'selected' : ''); ?>>Laos</option>
                                        <option value="LV"
                                            <?php echo e(Auth::user()->country == 'LV' ? 'selected' : ''); ?>>Latvia</option>
                                        <option value="LB"
                                            <?php echo e(Auth::user()->country == 'LB' ? 'selected' : ''); ?>>Lebanon</option>
                                        <option value="LS"
                                            <?php echo e(Auth::user()->country == 'LS' ? 'selected' : ''); ?>>Lesotho</option>
                                        <option value="LR"
                                            <?php echo e(Auth::user()->country == 'LR' ? 'selected' : ''); ?>>Liberia</option>
                                        <option value="LY"
                                            <?php echo e(Auth::user()->country == 'LY' ? 'selected' : ''); ?>>Libya</option>
                                        <option value="LI"
                                            <?php echo e(Auth::user()->country == 'LI' ? 'selected' : ''); ?>>Liechtenstein
                                        </option>
                                        <option value="LT"
                                            <?php echo e(Auth::user()->country == 'LT' ? 'selected' : ''); ?>>Lithuania</option>
                                        <option value="LU"
                                            <?php echo e(Auth::user()->country == 'LU' ? 'selected' : ''); ?>>Luxembourg
                                        </option>
                                        <option value="MO"
                                            <?php echo e(Auth::user()->country == 'MO' ? 'selected' : ''); ?>>Macao</option>
                                        <option value="MK"
                                            <?php echo e(Auth::user()->country == 'MK' ? 'selected' : ''); ?>>Macedonia</option>
                                        <option value="MG"
                                            <?php echo e(Auth::user()->country == 'MG' ? 'selected' : ''); ?>>Madagascar
                                        </option>
                                        <option value="MW"
                                            <?php echo e(Auth::user()->country == 'MW' ? 'selected' : ''); ?>>Malawi</option>
                                        <option value="MY"
                                            <?php echo e(Auth::user()->country == 'MY' ? 'selected' : ''); ?>>Malaysia</option>
                                        <option value="MV"
                                            <?php echo e(Auth::user()->country == 'MV' ? 'selected' : ''); ?>>Maldives</option>
                                        <option value="ML"
                                            <?php echo e(Auth::user()->country == 'ML' ? 'selected' : ''); ?>>Mali</option>
                                        <option value="MT"
                                            <?php echo e(Auth::user()->country == 'MT' ? 'selected' : ''); ?>>Malta</option>
                                        <option value="MH"
                                            <?php echo e(Auth::user()->country == 'MH' ? 'selected' : ''); ?>>Marshall Islands
                                        </option>
                                        <option value="MQ"
                                            <?php echo e(Auth::user()->country == 'MQ' ? 'selected' : ''); ?>>Martinique
                                        </option>
                                        <option value="MR"
                                            <?php echo e(Auth::user()->country == 'MR' ? 'selected' : ''); ?>>Mauritania
                                        </option>
                                        <option value="MU"
                                            <?php echo e(Auth::user()->country == 'MU' ? 'selected' : ''); ?>>Mauritius</option>
                                        <option value="YT"
                                            <?php echo e(Auth::user()->country == 'YT' ? 'selected' : ''); ?>>Mayotte</option>
                                        <option value="MX"
                                            <?php echo e(Auth::user()->country == 'MX' ? 'selected' : ''); ?>>Mexico</option>
                                        <option value="FM"
                                            <?php echo e(Auth::user()->country == 'FM' ? 'selected' : ''); ?>>Micronesia
                                        </option>
                                        <option value="MD"
                                            <?php echo e(Auth::user()->country == 'MD' ? 'selected' : ''); ?>>Moldova</option>
                                        <option value="MC"
                                            <?php echo e(Auth::user()->country == 'MC' ? 'selected' : ''); ?>>Monaco</option>
                                        <option value="MN"
                                            <?php echo e(Auth::user()->country == 'MN' ? 'selected' : ''); ?>>Mongolia</option>
                                        <option value="ME"
                                            <?php echo e(Auth::user()->country == 'ME' ? 'selected' : ''); ?>>Montenegro
                                        </option>
                                        <option value="MS"
                                            <?php echo e(Auth::user()->country == 'MS' ? 'selected' : ''); ?>>Montserrat
                                        </option>
                                        <option value="MA"
                                            <?php echo e(Auth::user()->country == 'MA' ? 'selected' : ''); ?>>Morocco</option>
                                        <option value="MZ"
                                            <?php echo e(Auth::user()->country == 'MZ' ? 'selected' : ''); ?>>Mozambique
                                        </option>
                                        <option value="MM"
                                            <?php echo e(Auth::user()->country == 'MM' ? 'selected' : ''); ?>>Myanmar [Burma]
                                        </option>
                                        <option value="NA"
                                            <?php echo e(Auth::user()->country == 'NA' ? 'selected' : ''); ?>>Namibia</option>
                                        <option value="NR"
                                            <?php echo e(Auth::user()->country == 'NR' ? 'selected' : ''); ?>>Nauru</option>
                                        <option value="NP"
                                            <?php echo e(Auth::user()->country == 'NP' ? 'selected' : ''); ?>>Nepal</option>
                                        <option value="NL"
                                            <?php echo e(Auth::user()->country == 'NL' ? 'selected' : ''); ?>>Netherlands
                                        </option>
                                        <option value="NC"
                                            <?php echo e(Auth::user()->country == 'NC' ? 'selected' : ''); ?>>New Caledonia
                                        </option>
                                        <option value="NZ"
                                            <?php echo e(Auth::user()->country == 'NZ' ? 'selected' : ''); ?>>New Zealand
                                        </option>
                                        <option value="NI"
                                            <?php echo e(Auth::user()->country == 'NI' ? 'selected' : ''); ?>>Nicaragua</option>
                                        <option value="NE"
                                            <?php echo e(Auth::user()->country == 'NE' ? 'selected' : ''); ?>>Niger</option>
                                        <option value="NG"
                                            <?php echo e(Auth::user()->country == 'NG' ? 'selected' : ''); ?>>Nigeria</option>
                                        <option value="NU"
                                            <?php echo e(Auth::user()->country == 'NU' ? 'selected' : ''); ?>>Niue</option>
                                        <option value="NF"
                                            <?php echo e(Auth::user()->country == 'NF' ? 'selected' : ''); ?>>Norfolk Island
                                        </option>
                                        <option value="KP"
                                            <?php echo e(Auth::user()->country == 'KP' ? 'selected' : ''); ?>>North Korea
                                        </option>
                                        <option value="MP"
                                            <?php echo e(Auth::user()->country == 'MP' ? 'selected' : ''); ?>>Northern Mariana
                                            Islands</option>
                                        <option value="NO"
                                            <?php echo e(Auth::user()->country == 'NO' ? 'selected' : ''); ?>>Norway</option>
                                        <option value="OM"
                                            <?php echo e(Auth::user()->country == 'OM' ? 'selected' : ''); ?>>Oman</option>
                                        <option value="PK"
                                            <?php echo e(Auth::user()->country == 'PK' ? 'selected' : ''); ?>>Pakistan</option>
                                        <option value="PW"
                                            <?php echo e(Auth::user()->country == 'PW' ? 'selected' : ''); ?>>Palau</option>
                                        <option value="PS"
                                            <?php echo e(Auth::user()->country == 'PS' ? 'selected' : ''); ?>>Palestine</option>
                                        <option value="PA"
                                            <?php echo e(Auth::user()->country == 'PA' ? 'selected' : ''); ?>>Panama</option>
                                        <option value="PG"
                                            <?php echo e(Auth::user()->country == 'PG' ? 'selected' : ''); ?>>Papua New Guinea
                                        </option>
                                        <option value="PY"
                                            <?php echo e(Auth::user()->country == 'PY' ? 'selected' : ''); ?>>Paraguay</option>
                                        <option value="PE"
                                            <?php echo e(Auth::user()->country == 'PE' ? 'selected' : ''); ?>>Peru</option>
                                        <option value="PH"
                                            <?php echo e(Auth::user()->country == 'PH' ? 'selected' : ''); ?>>Philippines
                                        </option>
                                        <option value="PN"
                                            <?php echo e(Auth::user()->country == 'PN' ? 'selected' : ''); ?>>Pitcairn Islands
                                        </option>
                                        <option value="PL"
                                            <?php echo e(Auth::user()->country == 'PL' ? 'selected' : ''); ?>>Poland</option>
                                        <option value="PT"
                                            <?php echo e(Auth::user()->country == 'PT' ? 'selected' : ''); ?>>Portugal</option>
                                        <option value="PR"
                                            <?php echo e(Auth::user()->country == 'PR' ? 'selected' : ''); ?>>Puerto Rico
                                        </option>
                                        <option value="QA"
                                            <?php echo e(Auth::user()->country == 'QA' ? 'selected' : ''); ?>>Qatar</option>
                                        <option value="CG"
                                            <?php echo e(Auth::user()->country == 'CG' ? 'selected' : ''); ?>>Republic of the
                                            Congo</option>
                                        <option value="RE"
                                            <?php echo e(Auth::user()->country == 'RE' ? 'selected' : ''); ?>>Réunion</option>
                                        <option value="RO"
                                            <?php echo e(Auth::user()->country == 'RO' ? 'selected' : ''); ?>>Romania</option>
                                        <option value="RU"
                                            <?php echo e(Auth::user()->country == 'RU' ? 'selected' : ''); ?>>Russia</option>
                                        <option value="RW"
                                            <?php echo e(Auth::user()->country == 'RW' ? 'selected' : ''); ?>>Rwanda</option>
                                        <option value="BL"
                                            <?php echo e(Auth::user()->country == 'BL' ? 'selected' : ''); ?>>Saint Barthélemy
                                        </option>
                                        <option value="SH"
                                            <?php echo e(Auth::user()->country == 'SH' ? 'selected' : ''); ?>>Saint Helena
                                        </option>
                                        <option value="KN"
                                            <?php echo e(Auth::user()->country == 'KN' ? 'selected' : ''); ?>>Saint Kitts and
                                            Nevis</option>
                                        <option value="LC"
                                            <?php echo e(Auth::user()->country == 'LC' ? 'selected' : ''); ?>>Saint Lucia
                                        </option>
                                        <option value="MF"
                                            <?php echo e(Auth::user()->country == 'MF' ? 'selected' : ''); ?>>Saint Martin
                                        </option>
                                        <option value="PM"
                                            <?php echo e(Auth::user()->country == 'PM' ? 'selected' : ''); ?>>Saint Pierre and
                                            Miquelon</option>
                                        <option value="VC"
                                            <?php echo e(Auth::user()->country == 'VC' ? 'selected' : ''); ?>>Saint Vincent and
                                            the Grenadines</option>
                                        <option value="WS"
                                            <?php echo e(Auth::user()->country == 'WS' ? 'selected' : ''); ?>>Samoa</option>
                                        <option value="SM"
                                            <?php echo e(Auth::user()->country == 'SM' ? 'selected' : ''); ?>>San Marino
                                        </option>
                                        <option value="ST"
                                            <?php echo e(Auth::user()->country == 'ST' ? 'selected' : ''); ?>>São Tomé and
                                            Príncipe</option>
                                        <option value="SA"
                                            <?php echo e(Auth::user()->country == 'SA' ? 'selected' : ''); ?>>Saudi Arabia
                                        </option>
                                        <option value="SN"
                                            <?php echo e(Auth::user()->country == 'SN' ? 'selected' : ''); ?>>Senegal</option>
                                        <option value="RS"
                                            <?php echo e(Auth::user()->country == 'RS' ? 'selected' : ''); ?>>Serbia</option>
                                        <option value="SC"
                                            <?php echo e(Auth::user()->country == 'SC' ? 'selected' : ''); ?>>Seychelles
                                        </option>
                                        <option value="SL"
                                            <?php echo e(Auth::user()->country == 'SL' ? 'selected' : ''); ?>>Sierra Leone
                                        </option>
                                        <option value="SG"
                                            <?php echo e(Auth::user()->country == 'SG' ? 'selected' : ''); ?>>Singapore</option>
                                        <option value="SX"
                                            <?php echo e(Auth::user()->country == 'SX' ? 'selected' : ''); ?>>Sint Maarten
                                        </option>
                                        <option value="SK"
                                            <?php echo e(Auth::user()->country == 'SK' ? 'selected' : ''); ?>>Slovakia</option>
                                        <option value="SI"
                                            <?php echo e(Auth::user()->country == 'SI' ? 'selected' : ''); ?>>Slovenia</option>
                                        <option value="SB"
                                            <?php echo e(Auth::user()->country == 'SB' ? 'selected' : ''); ?>>Solomon Islands
                                        </option>
                                        <option value="SO"
                                            <?php echo e(Auth::user()->country == 'SO' ? 'selected' : ''); ?>>Somalia</option>
                                        <option value="ZA"
                                            <?php echo e(Auth::user()->country == 'ZA' ? 'selected' : ''); ?>>South Africa
                                        </option>
                                        <option value="GS"
                                            <?php echo e(Auth::user()->country == 'GS' ? 'selected' : ''); ?>>South Georgia and
                                            the South Sandwich Islands</option>
                                        <option value="KR"
                                            <?php echo e(Auth::user()->country == 'KR' ? 'selected' : ''); ?>>South Korea
                                        </option>
                                        <option value="SS"
                                            <?php echo e(Auth::user()->country == 'SS' ? 'selected' : ''); ?>>South Sudan
                                        </option>
                                        <option value="ES"
                                            <?php echo e(Auth::user()->country == 'ES' ? 'selected' : ''); ?>>Spain</option>
                                        <option value="LK"
                                            <?php echo e(Auth::user()->country == 'LK' ? 'selected' : ''); ?>>Sri Lanka</option>
                                        <option value="SD"
                                            <?php echo e(Auth::user()->country == 'SD' ? 'selected' : ''); ?>>Sudan</option>
                                        <option value="SR"
                                            <?php echo e(Auth::user()->country == 'SR' ? 'selected' : ''); ?>>Suriname</option>
                                        <option value="SJ"
                                            <?php echo e(Auth::user()->country == 'SJ' ? 'selected' : ''); ?>>Svalbard and Jan
                                            Mayen</option>
                                        <option value="SZ"
                                            <?php echo e(Auth::user()->country == 'SZ' ? 'selected' : ''); ?>>Swaziland</option>
                                        <option value="SE"
                                            <?php echo e(Auth::user()->country == 'SE' ? 'selected' : ''); ?>>Sweden</option>
                                        <option value="CH"
                                            <?php echo e(Auth::user()->country == 'CH' ? 'selected' : ''); ?>>Switzerland
                                        </option>
                                        <option value="SY"
                                            <?php echo e(Auth::user()->country == 'SY' ? 'selected' : ''); ?>>Syria</option>
                                        <option value="TW"
                                            <?php echo e(Auth::user()->country == 'TW' ? 'selected' : ''); ?>>Taiwan</option>
                                        <option value="TJ"
                                            <?php echo e(Auth::user()->country == 'TJ' ? 'selected' : ''); ?>>Tajikistan
                                        </option>
                                        <option value="TZ"
                                            <?php echo e(Auth::user()->country == 'TZ' ? 'selected' : ''); ?>>Tanzania</option>
                                        <option value="TH"
                                            <?php echo e(Auth::user()->country == 'TH' ? 'selected' : ''); ?>>Thailand</option>
                                        <option value="TG"
                                            <?php echo e(Auth::user()->country == 'TG' ? 'selected' : ''); ?>>Togo</option>
                                        <option value="TK"
                                            <?php echo e(Auth::user()->country == 'TK' ? 'selected' : ''); ?>>Tokelau</option>
                                        <option value="TO"
                                            <?php echo e(Auth::user()->country == 'TO' ? 'selected' : ''); ?>>Tonga</option>
                                        <option value="TT"
                                            <?php echo e(Auth::user()->country == 'TT' ? 'selected' : ''); ?>>Trinidad and
                                            Tobago</option>
                                        <option value="TN"
                                            <?php echo e(Auth::user()->country == 'TN' ? 'selected' : ''); ?>>Tunisia</option>
                                        <option value="TR"
                                            <?php echo e(Auth::user()->country == 'TR' ? 'selected' : ''); ?>>Turkey</option>
                                        <option value="TM"
                                            <?php echo e(Auth::user()->country == 'TM' ? 'selected' : ''); ?>>Turkmenistan
                                        </option>
                                        <option value="TC"
                                            <?php echo e(Auth::user()->country == 'TC' ? 'selected' : ''); ?>>Turks and Caicos
                                            Islands</option>
                                        <option value="TV"
                                            <?php echo e(Auth::user()->country == 'TV' ? 'selected' : ''); ?>>Tuvalu</option>
                                        <option value="UM"
                                            <?php echo e(Auth::user()->country == 'UM' ? 'selected' : ''); ?>>U.S. Minor
                                            Outlying Islands</option>
                                        <option value="VI"
                                            <?php echo e(Auth::user()->country == 'VI' ? 'selected' : ''); ?>>U.S. Virgin
                                            Islands</option>
                                        <option value="UG"
                                            <?php echo e(Auth::user()->country == 'UG' ? 'selected' : ''); ?>>Uganda</option>
                                        <option value="UA"
                                            <?php echo e(Auth::user()->country == 'UA' ? 'selected' : ''); ?>>Ukraine</option>
                                        <option value="AE"
                                            <?php echo e(Auth::user()->country == 'AE' ? 'selected' : ''); ?>>United Arab
                                            Emirates</option>
                                        <option value="GB"
                                            <?php echo e(Auth::user()->country == 'GB' ? 'selected' : ''); ?>>United Kingdom
                                        </option>
                                        <option value="US"
                                            <?php echo e(Auth::user()->country == 'US' ? 'selected' : ''); ?>>United States
                                        </option>
                                        <option value="UY"
                                            <?php echo e(Auth::user()->country == 'UY' ? 'selected' : ''); ?>>Uruguay</option>
                                        <option value="UZ"
                                            <?php echo e(Auth::user()->country == 'UZ' ? 'selected' : ''); ?>>Uzbekistan
                                        </option>
                                        <option value="VU"
                                            <?php echo e(Auth::user()->country == 'VU' ? 'selected' : ''); ?>>Vanuatu</option>
                                        <option value="VA"
                                            <?php echo e(Auth::user()->country == 'VA' ? 'selected' : ''); ?>>Vatican City
                                        </option>
                                        <option value="VE"
                                            <?php echo e(Auth::user()->country == 'VE' ? 'selected' : ''); ?>>Venezuela</option>
                                        <option value="VN"
                                            <?php echo e(Auth::user()->country == 'VN' ? 'selected' : ''); ?>>Vietnam</option>
                                        <option value="WF"
                                            <?php echo e(Auth::user()->country == 'WF' ? 'selected' : ''); ?>>Wallis and Futuna
                                        </option>
                                        <option value="EH"
                                            <?php echo e(Auth::user()->country == 'EH' ? 'selected' : ''); ?>>Western Sahara
                                        </option>
                                        <option value="YE"
                                            <?php echo e(Auth::user()->country == 'YE' ? 'selected' : ''); ?>>Yemen</option>
                                        <option value="ZM"
                                            <?php echo e(Auth::user()->country == 'ZM' ? 'selected' : ''); ?>>Zambia</option>
                                        <option value="ZW"
                                            <?php echo e(Auth::user()->country == 'ZW' ? 'selected' : ''); ?>>Zimbabwe</option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">City</label>
                                    <input type="text" name="city" class="form-control" value="<?php echo e(Auth::user()->city ?? ''); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">State/Province</label>
                                    <input type="text" name="state_province" class="form-control" value="<?php echo e(Auth::user()->state_province ?? ''); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Address</label>
                                    <input type="text" name="address" class="form-control" value="<?php echo e(Auth::user()->address ?? ''); ?>">
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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <script>
        $(document).ready(function() {

        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('client.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/wer/Documents/Synet/wayoming/resources/views/client/dashboard/index.blade.php ENDPATH**/ ?>
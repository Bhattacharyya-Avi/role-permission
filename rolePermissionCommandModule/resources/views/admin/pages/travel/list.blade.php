@extends('admin.master')
@section('content')
    <div class="br-section-wrapper">
        <div class="row">
            {{-- add transportation expense  --}}

            <div class="col-sm-12" id="add_new_item_div">
                <div class="card bd-0">
                    <div class="card-header tx-medium bd-0 tx-white bg-teal">
                        <div class="row">
                            <div class="col-md-6"><h5>Add New Item</h5></div>
                            <div class="col-md-6" style="text-align: right;">
                                <button id="add_new_item_btn_close"
                                        class="btn btn-default btn-sm custom-btn-1 btn-1 tx-11 tx-uppercase pd-y-8 pd-x-18 tx-mont tx-medium  pull-right">
                                    <i class="fa fa-times"></i> Close
                                </button>
                            </div>
                        </div>
                    </div><!-- card-header -->
                    <div class="card-body bd bd-t-0 rounded-bottom">
                        <div class="table-wrapper">
                            <form action="{{route('travel_transportation_expenses.store')}}" method="post">
                                @csrf
                                <table class="table table-bordered " id="new_item_table">
                                    <thead>
                                    <tr>
                                        <th width="300px"> Travel Date * <input type="checkbox" id="copy_travel_date">
                                        </th>
                                        <th width="300px">Description * <input type="checkbox" id="copy_description">
                                        </th>
                                        <th width="300px">Meal Expense <input type="checkbox" id="copy_meal_expense">
                                        </th>
                                        <th width="300px">Accommodation Expense <input type="checkbox"
                                                                                       id="copy_accomendation_expense">
                                        </th>
                                        <th width="300px">Km Travelled <input type="checkbox" id="copy_km_travelled">
                                        </th>
                                        <th width="300px">Travel Mode * <input type="checkbox" id="copy_travel_mode">
                                        </th>
                                        <th width="300px">Fare Amount <input type="checkbox" id="copy_fare_amount"></th>
                                        <th width="300px">Other Expenses * <input type="checkbox"
                                                                                  id="copy_other_expenses"></th>
                                        <th width="300px">Exchange Rate <input type="checkbox" id="copy_exchge_rate">
                                        </th>
                                        <th width="300px">Remarks <input type="checkbox" id="copy_remarks"></th>
                                        <th style="text-align: center;">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr>

                                        <td><input type="date" name="data[0][travel_date]" autocomplete="off"
                                                   id="po_number_clone" class="form-control " placeholder="Travel Date"
                                                   title="Any whitespace not Allowed. Please remove & try again."></td>
                                        <td><input name="data[0][description]" autocomplete="off"
                                                   id="item_description_clone" class="form-control"
                                                   placeholder="Description"></td>
                                        <td><input type="number" name="data[0][meal_expense]" autocomplete="off"
                                                   id="item_number_clone" class="form-control"
                                                   placeholder="Meal Expense."></td>
                                        <td>
                                            <input type="number" name="data[0][accomendation_expense]"
                                                   autocomplete="off" id="item_fabric_ref_clone" class="form-control"
                                                   placeholder="Accomendation Expense.">

                                        </td>
                                        <td><input name="data[0][km_travelled]" autocomplete="off"
                                                   id="item_fabrication_clone" class="form-control"
                                                   placeholder="Km Travelled"></td>
                                        <td><input name="data[0][travel_mode]" autocomplete="off"
                                                   id="item_color_clone" class="form-control" placeholder="Travel Mode"
                                                   required=""></td>
                                        <td><input type="number" name="data[0][fare_amount]" autocomplete="off"
                                                   id="item_size_clone" class="form-control" placeholder="Fare Amount">
                                        </td>
                                        <td><input type="number" step="any" name="data[0][other_expenses]"
                                                   autocomplete="off" id="item_qty_clone" class="form-control"
                                                   placeholder="Other Expense" required=""></td>
                                        <td><input type="number" name="data[0][exchge_rate]" autocomplete="off"
                                                   id="etd_date_clone" class="form-control" placeholder="Exchange Rate">
                                        </td>
                                        <td><input name="data[0][remarks]" autocomplete="off"
                                                   id="contract_number_clone" class="form-control"
                                                   placeholder="Remarks."></td>

                                        <td>
                                        </td>
                                    </tr>

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td colspan="14">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <button type="button" onclick="addRow()" class="btn-info "><i
                                                            class="fa fa-plus-circle"></i> Add row
                                                    </button>
                                                </div>
                                                <div class="col-md-7" style="text-align: center;">

                                                </div>
                                                <div class="col-md-3" style="text-align: right;">
                                                    <button type="submit"
                                                            class="btn-success btn  tx-uppercase pd-y-8 pd-x-18 tx-mont tx-medium">
                                                        <i class="fa fa-save"></i> Save Information
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    </tfoot>

                                </table>
                            </form>
                        </div>
                    </div><!-- card-body -->
                </div><!-- card -->
            </div>


            {{-- add transportation expense  --}}



            {{-- item list start --}}

            <div class="col-sm-12">
                <div class="card bd-0">
                    <div class="card-header tx-medium bd-0 tx-white bg-primary">
                        <div class="row">
                            <div class="col-md-6"><h5><i class="fa fa-list"></i> Item List</h5></div>
                            <div class="col-md-6" style="text-align: right;">
                                {{-- @if($pi_details->status==0) --}}
                                <button id="edit_mode_btn"
                                        class="btn btn-dark btn-sm custom-btn-1 btn-1 tx-11 tx-uppercase pd-y-8 pd-x-18 tx-mont tx-medium pull-right">
                                    <i class="fas fa-edit"></i> Bulk Edit Mode
                                </button>


                                {{-- @if($pi_details->status==0) --}}

                                    <button id="add_new_item_btn"
                                            class="btn btn-primary btn-sm custom-btn-1 btn-1 tx-11 tx-uppercase pd-y-8 pd-x-18 tx-mont tx-medium  pull-right">
                                        <i class="fas fa-plus-circle"></i> Add Bulk Items
                                    </button>

                                {{-- @endif             --}}
                            </div>
                        </div>
                    </div><!-- card-header -->
                    <div class="card-body bd bd-t-0 rounded-bottom">
                        <div class="table-wrapper">
                            <form action="">
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>
                                        <div class="icheck-primary checkbox checkbox-primary select_all_checkbox">
                                            <input class="select_all_checkbox" type="checkbox" id="bulk"
                                                   onClick="check_uncheck_checkbox(this.checked);">
                                            <label class="font-weight-normal" for="bulk"></label>
                                        </div>
                                    </th>
                                    <th class="msb-bg-table-td" style="text-align: center;" width="5%">SN</th>
                                    <th class="msb-bg-table-td" style="text-align: center;">DATE</th>
                                    <th class="msb-bg-table-td" style="text-align: center;">DESCRIPTION
                                    </th>
                                    <th class="msb-bg-table-td" style="text-align: center;">MEAL EXPENSE</th>
                                    <th class="msb-bg-table-td" style="text-align: center;" width="150px">ACCOMMODATION
                                        EXPENSE
                                    </th>
                                    <th class="msb-bg-table-td custom_width" style="text-align: center;" width="150px">
                                        KM TRAVELLED
                                    </th>
                                    <th class="msb-bg-table-td" style="text-align: center;">TRAVEL MODE</th>
                                    <th class="msb-bg-table-td" style="text-align: center;">FARE AMOUNT</th>
                                    <th class="msb-bg-table-td" style="text-align: center;">OTHER EXPENSES</th>
                                    <th class="msb-bg-table-td" style="text-align: center;">TOTAL EXPENSES</th>
                                    <th class="msb-bg-table-td" style="text-align: center;">Exchange RATE</th>
                                    <th class="msb-bg-table-td" style="text-align: center;">TOTAL EXPENSE IN LOCAL
                                        CURRENCY
                                    </th>
                                    <th class="msb-bg-table-td" style="text-align: center;">REMARKS</th>
                                    <th class="msb-bg-table-td" style="text-align: center;">Status</th>
                                    <th class="msb-bg-table-td" style="text-align: center;">ACTION</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $i=0; $total_amount=0; $total_meal = 0; $total_accommodation = 0; $total_fare = 0; $other = 0; $subTotal = 0; @endphp
                                @foreach($transportation_expenses as $item)
                                    @php $total_amount  += (($item->sub_total)*($item->exchange_rate));
                                         $total_meal    += $item->meal_expense;
                                         $total_fare    += $item->fare_amount;
                                         $other         += $item->other_expenses;
                                         $subTotal      += $item->sub_total;
                                         $total_accommodation += $item->accommodation_expense;
                                    @endphp
                                    <tr>
                                        <td>
                                            <div
                                                class="icheck-info checkbox checkbox-info select_all_checkbox msb-txt-center">
                                                <input type="checkbox" class="select_single_id"
                                                       id="single_item_id_{{$item->id}}" name="pi_item_id[]"
                                                       value="{{$item->id}}">
                                                <label class="font-weight-normal"
                                                       for="single_item_id_{{$item->id}}"></label>
                                            </div>
                                        </td>
                                        <td class="msb-txt-center">{{++$i}}</td>
                                        <td style="text-align: center;">@if(!empty($item->date))
                                                {{date('d-M-Y', strtotime($item->date))}}
                                            @endif</td>
                                        <td style="text-align: center;">{{$item->description}}</td>
                                        <td style="text-align: center;">{{$item->meal_expense}}</td>
                                        <td style="text-align: center;">{{$item->accommodation_expense}}</td>
                                        <td style="text-align: center;">{{$item->km_travelled}}</td>
                                        <td style="text-align: center;">{{$item->travel_mode}}</td>
                                        <td style="text-align: center;">{{$item->fare_amount}}</td>
                                        <td style="text-align: center;">{{$item->other_expenses}}</td>
                                        <td style="text-align: center;">{{$item->sub_total}}</td>
                                        <td style="text-align: center;">{{$item->exchange_rate}}</td>
                                        <td style="text-align: center;">{{$item->exchange_rate * $item->sub_total}}</td>
                                        <td style="text-align: center;">{{$item->remarks}}</td>
                                        <td style="text-align: center; background: #f9f9f9;">
                                            @if($item->status==0)
                                                <button value="{{base64_encode($item->id)}}"
                                                        class="copy_pi_item_information_modal btn btn-pink btn-sm"
                                                        title="Duplicate"><i class="fa fa-copy"></i></button>


                                                <button value="{{base64_encode($item->id)}}"
                                                        class="update_pi_item_information_modal btn btn-teal btn-sm"
                                                        title="Edit"><i class="fa fa-edit"></i></button>


                                                <a class="btn btn-sm btn-danger"
                                                   href="#"
                                                   onclick="return confirm('Are you sure to destroy?')"
                                                   title="Destroy"><i class="fa fa-trash-alt"></i></a>

                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th class="edit_mode"></th>
                                    <th colspan="3" style="background: #f9f9f9;">Total Amount</th>
                                    <th class="msb-txt-center">{{ $total_meal}}</th>
                                    <th class="msb-txt-center">{{ $total_accommodation}}</th>
                                    <th></th>
                                    <th></th>
                                    <th class="msb-txt-center">{{ $total_fare}}</th>
                                    <th class="msb-txt-center">{{$other}}</th>
                                    <th class="msb-txt-center">{{$subTotal}}</th>
                                    <th class="msb-txt-center"></th>
                                    <th class="msb-txt-center">{{$total_amount}}</th>
                                </tr>
                                </tfoot>
                            </table>
                            <br>
                            <div class="msb-txt-center pd-y-15">
                                {{-- <input type="hidden" value="{{$pi_details->id}}" name="pi_id"> --}}
                                <button class="btn btn-info btn-sm custom-btn-1 ml-2 msb-txt-center btnSubmit"
                                        name="btnSubmit" onClick="return confirm('Are you sure?')" type="submit"
                                        value="edit"><i class="fa fa-edit"></i> Edit Selected Items
                                </button>
                                {{-- @if($pi_details->created_by==Auth::user()->id) --}}
                                <button class="btn btn-danger btn-sm custom-btn-1 ml-2 msb-txt-center btnSubmit"
                                        name="btnSubmit" onClick="return confirm('Are you sure?')" type="submit"
                                        value="delete"><i class="fa fa-trash-alt"></i> Delete Selected Items
                                </button>
                                {{-- @endif  --}}
                            </div>
                            </form>
                        </div>
                    </div><!-- card-body -->
                </div><!-- card -->
            </div>

            {{-- item list end --}}


            {{-- Edit PI Item Information --}}

            <div id="edit_pi_item_details" class="modal fade effect-sign">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content bd-0 tx-14">
                        <div class="modal-header pd-y-15 pd-x-25 modal_header_1">
                            <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold"><i class="fa fa-edit "></i> Edit PI
                                Item Information</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><i class="fas fa-times"></i></span>
                            </button>
                        </div>
                        <div class="modal-body pd-20">
                            <span id="form_result"></span>
                            <div class="modal_body_inner">
                                <form action="">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <h6> PI Item Information</h6>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group row">
                                            <label for="form-label" class="col-sm-3 control-label form-label-1"> PO
                                                Number</label>
                                            <div class="col-sm-9 pl-0">
                                                <input name="po_number" pattern="^\S+$"
                                                       title="Any whitespace not Allowed. Please remove & try again."
                                                       autocomplete="off" id="po_number_edit" class="form-control"
                                                       placeholder="PO Number" required="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group row">
                                            <label for="form-label" class="col-sm-3 control-label form-label-1">
                                                Contract No.</label>
                                            <div class="col-sm-9 pl-0">
                                                <input name="contract_number" autocomplete="off" maxlength="25"
                                                       id="contract_number_edit" class="form-control"
                                                       placeholder="Contract No.">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group row">
                                            <label for="form-label" class="col-sm-3 control-label form-label-1"> Item
                                                No</label>
                                            <div class="col-sm-9 pl-0">
                                                <input name="item_number" autocomplete="off" maxlength="25"
                                                       id="item_number_edit" class="form-control"
                                                       placeholder="Item No.">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group row">
                                            <label for="form-label" class="col-sm-3 control-label form-label-1">
                                                Description</label>
                                            <div class="col-sm-9 pl-0">
                                                <input name="item_description" autocomplete="off"
                                                       id="item_description_edit" class="form-control"
                                                       placeholder="Description" maxlength="250">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group row select_2_row_modal">
                                            <label for="form-label" class="col-sm-3 control-label form-label-1"> Fabric
                                                Library Ref.</label>
                                            <div class="col-sm-9 pl-0">
                                                <select name="item_fabric_library_ref" id="item_fabric_ref_id"
                                                        class="form-control" placeholder="Fabric Ref.">
                                                    <option value="">Select a Reference</option>

                                                </select>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group row">
                                            <label for="form-label" class="col-sm-3 control-label form-label-1">
                                                Fabrication</label>
                                            <div class="col-sm-9 pl-0">
                                                <input name="item_fabrication" autocomplete="off"
                                                       id="item_fabrication_edit" class="form-control"
                                                       placeholder="Fabrication">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group row">
                                            <label for="form-label" class="col-sm-3 control-label form-label-1">
                                                Color</label>
                                            <div class="col-sm-9 pl-0">
                                                <input name="item_color" autocomplete="off" id="item_color_edit"
                                                       class="form-control" placeholder="Color" required="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group row">
                                            <label for="form-label" class="col-sm-3 control-label form-label-1">
                                                Size</label>
                                            <div class="col-sm-9 pl-0">
                                                <input name="item_size" autocomplete="off" id="item_size_edit"
                                                       class="form-control" placeholder="Size">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group row">
                                            <label for="form-label" class="col-sm-3 control-label form-label-1"> Item
                                                Qty</label>
                                            <div class="col-sm-9 pl-0">
                                                <input type="number" step="any" name="item_qty" autocomplete="off"
                                                       id="item_qty_edit" class="form-control" placeholder="QTY"
                                                       required="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group row">
                                            <label for="form-label" class="col-sm-3 control-label form-label-1"> Buyer
                                                FOB</label>
                                            <div class="col-sm-9 pl-0">
                                                <input type="number" step="any" name="item_fob" autocomplete="off"
                                                       id="item_fob_edit" class="form-control" placeholder="Buyer FOB"
                                                       required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group row">
                                            <label for="form-label" class="col-sm-3 control-label form-label-1"> ETD
                                                Date</label>
                                            <div class="col-sm-9 pl-0">
                                                <input type="text" name="etd_date" autocomplete="off" id="etd_date_edit"
                                                       class="form-control" placeholder="ETD Date">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <hr>
                                    </div>

                                    <div class="form-group text-center col-sm-12">

                                        <input type="hidden" name="id" id="id_edit">
                                        <button class="btn btn-info btn-sm custom-btn-1 ml-2" type="submit"><i
                                                class="fa fa-save"></i> Update
                                        </button>
                                        <button type="button"
                                                class="btn btn-danger btn-sm custom-btn-1 tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium"
                                                data-dismiss="modal"><i class="fa fa-times"></i> Close
                                        </button>
                                    </div>

                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div><!-- modal-dialog -->
            </div>
            <!--end Edit PI Item Information modal -->

        </div>
    </div>
@endsection

@push('js')
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>


            $(document).on('click', '#add_new_item_btn', function () {
                $("#add_new_item_div").show();
                return false;
            });

            $(document).on('click', '#add_new_item_btn_close', function () {
                $("#add_new_item_div").hide();
                return false;
            });

            $("#copy_travel_date").change(function () {
                if (this.checked) {
                    var po_number_clone = $("#po_number_clone").val();
                    $(".copy_travel_date_value").val(po_number_clone);
                }
            });

            $("#copy_contract_number").change(function () {
                if (this.checked) {
                    var contract_number_clone = $("#contract_number_clone").val();
                    $(".copy_remarks_value").val(contract_number_clone);
                }
            });

            $("#copy_meal_expense").change(function () {
                if (this.checked) {
                    var item_number_clone = $("#item_number_clone").val();
                    $(".copy_meal_expense_value").val(item_number_clone);
                }
            });

            $("#copy_description").change(function () {
                if (this.checked) {
                    var item_description_clone = $("#item_description_clone").val();
                    $(".copy_description_value").val(item_description_clone);
                }
            });

            $("#copy_km_travelled").change(function () {
                if (this.checked) {
                    var item_fabrication_clone = $("#item_fabrication_clone").val();
                    $(".copy_km_travelled_value").val(item_fabrication_clone);
                }
            });

            $("#copy_accomendation_expense").change(function () {
                if (this.checked) {
                    var item_fabric_ref_clone = $("#item_fabric_ref_clone").val();
                    $(".copy_accomendation_expense_value").val(item_fabric_ref_clone);
                }
            });

            $("#copy_fare_amount").change(function () {
                if (this.checked) {
                    var item_size_clone = $("#item_size_clone").val();
                    $(".copy_fare_amount_value").val(item_size_clone);
                }
            });

            $("#copy_travel_mode").change(function () {
                if (this.checked) {
                    var item_color_clone = $("#item_color_clone").val();
                    $(".copy_travel_mode_value").val(item_color_clone);
                }
            });

            $("#copy_other_expenses").change(function () {
                if (this.checked) {
                    var item_qty_clone = $("#item_qty_clone").val();
                    $(".copy_other_expenses_value").val(item_qty_clone);
                }
            });


            $("#copy_exchge_rate").change(function () {
                if (this.checked) {
                    var etd_date_clone = $("#etd_date_clone").val();
                    $(".copy_exchge_rate_value").val(etd_date_clone);
                }
            });


            var i = 0;
        function addRow() {
            i = i+1;
            var tr = '<tr><td><input name="data[' + i + '][travel_date]" autocomplete="off" id="" class="form-control copy_travel_date_value " placeholder="Date"  type="date" ></td><td><input name="data[' + i + '][remarks]" autocomplete="off" id="copy_remarks_value" class="form-control copy_remarks_value" placeholder="Remarks"></td><td><input name="data[' + i + '][meal_expense]" autocomplete="off" id="copy_meal_expense_value" class="form-control copy_meal_expense_value" placeholder="Meal Expense." type="number" ></td><td><input name="data[' + i + '][description]" autocomplete="off" class="form-control copy_description_value" placeholder="Description" required="" ></td><td><input name="data[' + i + '][accomendation_expense]" id="copy_accomendation_expense_value" class="form-control copy_accomendation_expense_value" placeholder="Accomendation expensef." type="number" ></td><td><input name="data[' + i + '][km_travelled]" autocomplete="off" class="form-control copy_km_travelled_value" placeholder="Km Travelled" required="" ></td><td><input name="data[' + i + '][travel_mode]" autocomplete="off" class="form-control copy_travel_mode_value" placeholder="Travel mode" required=""></td><td><input name="data[' + i + '][fare_amount]" autocomplete="off" id="copy_fare_amount" class="form-control copy_fare_amount" type="number" placeholder="Fare Amount"></td><td><input type="number" step="any" name="data[' + i + '][other_expenses]" autocomplete="off" class="form-control copy_other_expenses_value" type="number" step="any" placeholder="Other Expenses" required=""></td><td><input type="number" name="data[' + i + '][exchge_rate]" autocomplete="off" id="copy_exchge_rate_value"   class="form-control copy_exchge_rate_value" placeholder="Exchange rate"></td><td class="remove" style="text-align: center"><a href="#" class="btn-sm btn-danger" onclick="deleteRow()"><i class="fa fa-times"></i></a></td></tr>';

            $('#new_item_table tbody').append(tr);
        }

        $(document).on("wheel", "input[type=number]", function (e) {
            $(this).blur();
        });

        function deleteRow() {
            $(document).on('click', '.remove', function () {
                $(this).parent('tr').remove();
                return false;

            });
        }


        $(".select_all_checkbox").hide();
        $(".select_single_id").hide();
        $("#edit_mode_hide_btn").hide();
        $(".btnSubmit").hide();

        function cloneRow() {
            var $componentTB = $("#new_item_table"),
                $firstTRCopy = $componentTB.children('tr').first().clone();
            $(".clone").click(function () {
                $componentTB.append($firstTRCopy.clone());
            });
        }

        $("#add_new_item_div").hide();



        function check_uncheck_checkbox(isChecked) {
            if (isChecked) {
                $('input[class="select_single_id"]').each(function () {
                    this.checked = true;
                });
            } else {
                $('input[class="select_single_id"]').each(function () {
                    this.checked = false;
                });
            }
        }


    </script>

@endpush

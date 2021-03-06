@extends('admin/baseAdmin')

@section('content')



<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modaladd">
    افزودن
</button>
<table id="datatable" class="table table-bordered table-hover" dir="rtl">
    <thead>
        <tr>
            <th>
                ردیف
            </th>
            <th>
                گروه
            </th>
            <th>
                مقطع
            </th>
            <th>
                تاریخ ایجاد
            </th>
            <th>
                آخرین تغییرات
            </th>
        </tr>
    </thead>
    <tbody>
        @forelse($data as $item)
        <tr>
            <td>{{$item->fldid}}</td>
            <td>{{$item->fldgroup}}</td>
            <td>{{$item->fldlevel}}</td>
            <td>{{$item->fldcreated_at}}</td>
            <td>{{$item->fldupdated_at}}</td>
            <td>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalEdit{{$item->fldid}}">
                    ویرایش
                </button>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDelete">
                    حذف
                </button>

            </td>
            <!-- Modal -->
            <!-- Modal Edit -->
    <div class="modal fade" id="modalEdit{{$item->fldid}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">ویرایش گروه های درسی</h4>
                </div>
                {!! Form::open(array('url' => '/admin/department/edit','class'=>'ajaxForm','id'=>"editform".$item->fldid)) !!}
                <div class="modal-body">
                    <input type="hidden" name="fldid" value="{{$item->fldid}}" />
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group col-md-6 col-sm-6">
                            <label for="name">گروه*	</label>
                            <input type="text" class="form-control input-sm" id="name" name="fldgroup" value="{{$item->fldgroup}}" placeholder="First name">
                        </div>
                        <div class="form-group col-md-6 col-sm-6">
                            <label for="name">مقطع*	</label>
                            <input type="text" class="form-control input-sm" id="name" name="fldlevel" value="{{$item->fldlevel}}" placeholder="First name">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <!-- Delete -->
    <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>
                {!! Form::open(array('url' => '/admin/department/delete','class'=>'ajaxForm','id'=> 'deleteform'.$item->id)) !!}
                <div class="modal-body">
                    <input type="hidden" name="fldid" value="{{$item->fldid}}" />
                    <h3>آیا از حذف اطلاعات مطمئن هیستید ؟</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">خیر</button>
                    <button type="submit" class="btn btn-primary">بله</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <!-- End Modal -->
</tr>


@empty
<h5>اطلاعاتی یافت نشد</h5>
@endforelse
</tbody>
</table>

<!-- Modal Add -->
<div class="modal fade" id="modaladd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">افزودن گروه درسی</h4>
            </div>
            {!! Form::open(array('url' => '/admin/department/add','class'=>'ajaxForm')) !!}
            <div class="modal-body">
                <div class="col-md-12 col-sm-12">
                    <div class="form-group col-md-6 col-sm-6">
                        <label for="name">گروه*	</label>
                        <input type="text" class="form-control input-sm" id="name" name="fldgroup" placeholder="گروه">
                    </div>
                    <div class="form-group col-md-6 col-sm-6">
                        <label for="name">مقطع*	</label>
                        <input type="text" class="form-control input-sm" id="name" name="fldlevel"  placeholder="مقطع">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">ثبت اطلاعات</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#datatable').DataTable();
    });

</script>
@stop
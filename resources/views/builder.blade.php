@extends('layouts.admin')

@section('content')
    <div class="container mx-auto px-10">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <x-messages-noty />


                        <form action="{{ route('builder.store') }}" method="post">
                            @csrf
                            <x-inputs.text name="name" id="name">
                                <x-slot name="label">@lang('Name for Module') </x-slot>
                                <x-slot name="value">{{ old('name') ?? '' }}</x-slot>
                                <x-slot name="placeholder">@lang('Name for Module') </x-slot>
                            </x-inputs.text>
                            <x-inputs.text name="route" id="route">
                                <x-slot name="label">@lang('Name for route') </x-slot>
                                <x-slot name="value">{{ old('route') ?? '' }}</x-slot>
                                <x-slot name="placeholder">@lang('Name for route') </x-slot>
                            </x-inputs.text>
                            <x-inputs.btn_create label="creeate" />

                        </form>
                    </div>
                    <ul class="list-disc">
                        <li> 1 - اضف بيانات جدول البيانات في ملف Migration
                            ضمن مجلد ال database
                            في المودل الجديد</li>

                        <li>
                            2 انشر الملف باستخدام :
                            php artisan module:publish-migration Post </li>

                        <li>
                            ثم php artisan migrate
                        </li>

                        <li>
                            go to folder Entities in file mode new module add line :
                            protected $guarded = [];
                        </li>

                        <li>
                            3- في صفحات العرض blade : <br />
                            يمكنك اضافة الحقول المطلوبة للاضافة<br />
                             والتعديل في ملفات :     <br />
                            form_add form_edit.blade.php
                            في مجلد components<br />
                            ولاستعراض عنصر يمكنك<br />
                             اضافة التفاصل في ملف<br />
                             form_show<br />
                            عندما يضفط احد على زر<br />
                            show سوف يظهر محتوى الملف<br />
                            form_show

                        </li>
                        <li>
                            بصفخة index حاليا يوجد عمود id , actions
                            <br />
                            لأضافة باقي الاعمدة اولا اضف في <thead> اسمائ الاعمد <br />
                                ثم انتقل الى مجلد Services <br />
                                 وضمن ملف السرفس سوف تجد فانكشن
                                 <br /> getRowsTable
                                 يمكنك اضافة الاعمدة التي تحتاجها هنا مثلا لأضافة عمود اسمه name :
                                <code> $output .= '<tr>' .
                                    '<td>' . $item->id . '</td>' .
                                    '<td> ' .$item->name . '</td>' .
                                    ...
                                </code>
                                    <br />

                        </li>
                        <li>
                            في صفحة index عند الضغط على زر التعديل او المشاهدة  سوف تظهر نافذة منبثقة <br />
                            لملى الحقول والبيانات الصحيحة يمكنك اضافتها من كود jquery ضمن صفحة index مثلا :
                           لدينا جدول فيه حقل بأسم address ونريد عندما نضغط على زر التعديل يتم ملىئ الانبوت

                            <code >

                                function btnEditModal(id){
                                    console.log('btn_edit_modal');
                                    var modal = $('#form_edit');
                                    var action = $('#'+id).data('action');
                                    var data = $('#'+id).data('data');
                                    console.log(data);
                                    modal.find('form').attr('action', action);
                                    modal.find('input[name=title]').val(data.title);
                                    modal.find('input[name=address]').val(data.address);  // add this

                                }
                            </code>
                        </li>

                    </ul>



                </div>
            </div>
        </div>
    </div>
@endsection

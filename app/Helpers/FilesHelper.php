<?php
use Modules\Media\Entities\Media;

function cryptoQR($wallet)
{
    return "https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=$wallet&choe=UTF-8";
}

function getImage($image, $full_path = false, $size = null)
{
    $default = asset('images/default_user.png');
    if ($full_path) {
        if (file_exists (public_path ($image)) )
            return asset($image);
        return $default;
    }
    if (is_numeric($image)) {
        $image_name = Media::find($image);
        if ($image_name)
            return asset('uploads/' . $image_name->name);
    }


    if ( file_exists (public_path ('uploads/' . $image)))
        return asset('uploads/' . $image);
        if ( file_exists (public_path ('images/' . $image)))
            return asset('images/' . $image);
    return $default;
}

// دالة لرفع صورة وإرجاع اسمها
 function uploadImage ($image,$name_parameter='image',$path = 'uploads' ) {
    // التحقق من صحة الملف
    $validated = request ()->validate ( [
        $name_parameter => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // توليد اسم عشوائي للصورة
    $imageName = quickRandom(5).'_'.$image->getClientOriginalName();

    // نقل الصورة إلى المجلد public/images
    $image->move (public_path ('images'), $imageName);

    // إرجاع اسم الصورة
    return $imageName;
    }

function uploadOneFile($file, $note = "")
{

    $type = strstr($file->getMimeType(), '/', true);
    $rand = quickRandom(5);
    $name_file = $file->getClientOriginalName();
    $name_file = str_replace(' ', '_', $name_file);
    $fileName = $rand . '_' . $name_file;
    $file->move(public_path('uploads'), $fileName);
    // filesize
    $filesize = filesize(public_path('uploads/' . $fileName)) / 1024 / 1024;
    $filesize = number_format($filesize, 2) . " MB";
    // dimensions
    try {
        $data = getimagesize(public_path('uploads/' . $fileName));
        $dimensions = $data[0] . "|" . $data[1];
    } catch (\Throwable $th) {
        $dimensions = "";
    }

    $media = Media::create([
        'name' => $fileName,
        'file_path' => 'uploads/' . $fileName,
        'type' => $type,
        'dimensions' => $dimensions,
        'size' => $filesize,
        'note' => $note,
        'user_id' => auth()->user()->id
    ]);
    return $media;
}

<?php
namespace App\Http\tool;

use Illuminate\Support\Facades\Storage;
use App\Models\category;

class tool
{

    public function delete($date, $model)
    {
       
        //nếu model =1 chỉ có 2 trạng thái null là không vô hiệu hóa 0 là vô hiệu hóa 1 trạng thái vô hiệu hóa dữ liệu mình tham chiếu đến
        if ($model == 2) {
            if ($date == null ||$date == 0) {
                $result = [
                    "delete" => 1,
                ];
            } else {
                $result = [
                    "delete" => 0
                ];
            }

        } else {
            if ($date == 0) {
                $result = [
                    "delete" => 0
                ];
            }
            else {
                $result = [
                    "delete" => 2
                ];
               
            }
          

        }
      


        return $result;

    }

    public function upImg($request, $name, $imageName2)
    {

        $image = $request->file($name);

        $imageName = time() . '_' . $image->getClientOriginalName();

        $image->storeAs('public/images/' . $imageName2, $imageName);

        $filePath = 'storage/images/' . $imageName2 . '/' . $imageName;


        return $filePath;
    }


}

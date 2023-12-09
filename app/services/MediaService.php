<?php

namespace App\Services;

use App\Models\Media;

class MediaService
{
    // function createMedia($request, $model, $image_name = 'image', $file = false)
    // {
    //     if ($file || $request->hasFile($image_name)) {

    //         $image = $file ? $file->first() : $request->file($image_name);
    //         // dd($image);
    //         // Check if there's an existing image associated with the model
    //         $existingImage = $model->image;


    //         if ($existingImage) {
    //             // Delete the old image file
    //             $oldImagePath = public_path('event/images/') . '/' . $existingImage->filename;
    //                 //  dd($oldImagePath);
    //             if (file_exists($oldImagePath)) {
    //                 unlink($oldImagePath);
    //             }

    //             // Delete the old image record from the database
    //             $existingImage->delete();
    //         }

    //         // Continue with the code to store the new image
    //         $data = [
    //             'filename' => "event/images/" . time() . $image->getClientOriginalName(),
    //             'filetype' => $image->getClientMimeType(),
    //             'type' => 'image',
    //             'createBy_type' => get_class($model),
    //             'createBy_id' => $model->id,
    //             'updateBy_type' => null,
    //             'updateBy_id' => null,
    //         ];

    //         $image->move(public_path('event/images/'), $data['filename']);
    //         $model->images()->updateOrCreate(['createBy_id' => $model->id], $data);
    //         return $data['filename'];
    //     }
    // }
    function createMedia($request, $model, $image_name = 'image', $file = false, $modelType = 'Event')
    {
        if ($file || $request->hasFile($image_name)) {
            $image = $file ? $file : $request->file($image_name);
            $existingImage = $model->images->first();
// dd($existingImage);
            if ($existingImage) {

                // Delete the old image file
                $oldImagePath = public_path('Tickets') . '/' . $existingImage->filename;

                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }

                // Delete the old image record from the database
                $existingImage->delete();
            }

            $data = [
                'filename' => "Tickets/" . time() . $image->getClientOriginalName(),
                'filetype' => $image->getClientMimeType(),
                'type' => 'image',
                'createBy_type' => get_class($model),
                'createBy_id' => $model->id,
                'updateBy_type' => null,
                'updateBy_id' => null,
            ];

            $image->move(public_path('Tickets/'), $data['filename']);

            // Update media based on the model type
            if ($modelType === 'Event') {
                $model->images()->updateOrCreate(['createBy_id' => $model->id], $data);
            } elseif ($modelType === 'EventTime') {
                $model->images()->updateOrCreate(['createBy_id' => $model->id], $data);
            }

            return $data['filename'];
        }
    }

    function updateMedia($model, $image, $modelType = 'Event')
{
    if ($image) {
        $existingImage = $modelType === 'Event' ? $model->image : $model->images->first();

        if ($existingImage) {
            // Delete the old image file
            $oldImagePath = public_path('Tickets') . '/' . $existingImage->filename;
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            // Update the old image record with the new data
            $data = [
                'filename' => "Tickets/" . time() . $image->getClientOriginalName(),
                'filetype' => $image->getClientMimeType(),
            ];

            $existingImage->update($data);
        } else {
            // Create a new media record
            $data = [
                'filename' => "Tickets/" . time() . $image->getClientOriginalName(),
                'filetype' => $image->getClientMimeType(),
                'type' => 'image',
                'createBy_type' => get_class($model),
                'createBy_id' => $model->id,
            ];

            if ($modelType === 'Event') {
                $model->images()->create($data);
            } elseif ($modelType === 'EventTime') {
                $model->images()->create($data);
            }
        }

        $image->move(public_path('event/images/'), $data['filename']);
    }
}
    function deleteMedia($model)
    {

        $model->images->each(function ($image) {

            // Delete the old image file
            $oldImagePath = public_path('') . '/' . $image->filename;
            // dd($oldImagePath);

            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            // Delete the old image record from the database
            $image->delete();
        });
    }
}

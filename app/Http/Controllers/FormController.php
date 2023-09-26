<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class FormController extends Controller
{
    public function store(Request $request)
    {
        $rules = [
            'upload-image' => 'required|image|mimes:jpeg,jpg,png',
            'pet-name' => 'required|string|max:255',
            'pet-species' => 'required|string|max:255',
            'pet-breed' => 'required|string|max:255',
            'pet-age' => 'required|numeric|min:1',
            'pet-weight' => 'required|numeric|between:2.5,99.99',
        ];

        $messages = [
            'upload-image.required' => 'Please upload an image.',
            'pet-age.min' => 'The pet age must be at least 1 year.',
            'pet-weight.min' => 'The pet weight must be at least 2.5 kg.',
        ];

        $validatedData = $request->validate($rules, $messages);

        $uploadedImage = $request->file('upload-image');
        $petName = $request->input('pet-name');
        $slugPet = Str::slug($petName, '-');
        $imageExtension = $uploadedImage->getClientOriginalExtension();
        $imageName = $slugPet . '_' . time() . '.' . $imageExtension;
        $imagePath = $uploadedImage->storeAs('public/image/', $imageName);
        $formData = [
            'petName' => $request->input('pet-name'),
            'petSpecies' => $request->input('pet-species'),
            'petBreed' => $request->input('pet-breed'),
            'petAge' => $request->input('pet-age'),
            'petWeight' => $request->input('pet-weight'),   
            'imagePath' => $imagePath
        ];
        $jsonData = json_encode($formData, JSON_PRETTY_PRINT);
        $jsonFileName = Str::replaceLast('.' . $imageExtension, '', $imageName) . '.json';
        Storage::disk('public')->put('json/' . $jsonFileName, $jsonData);

        return back()->with('success', 'Form submitted successfully.');
    }
}
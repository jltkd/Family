<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Avatar;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Place;
use Laravel\Nova\Fields\Text;
use Bissolli\NovaPhoneField\PhoneNumber;
use Inspheric\Fields\Email;
use Laravel\Nova\Http\Requests\NovaRequest;

class Relative extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Relative';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->hideFromIndex(),
            Avatar::make('Profile Image')->disk('s3')->disableDownload(),
            Text::make('First Name')->rules('required'),
            Text::make('Last Name')->rules('required'),
            Date::make('Birthday', 'birthdate')->format('MM-DD-YYYY'),
            Text::make('Relation')->rules('required')->hideFromIndex(),
            PhoneNumber::make('Phone')->onlyCountries('US'),
            Email::make('Email')->alwaysClickable(),
            $this->addressFields(),
        ];
    }

    protected function addressFields()
    {
        return $this->merge([
            Place::make('Address')->hideFromIndex(),
            Text::make('City')->hideFromIndex(),
            Text::make('State')->hideFromIndex(),
            Text::make('Postal Code')->hideFromIndex(),
        ]);
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}

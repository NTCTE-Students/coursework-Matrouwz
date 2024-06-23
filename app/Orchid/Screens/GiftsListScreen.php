<?php

namespace App\Orchid\Screens;

use App\Models\Gift;
use Orchid\Screen\Screen;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Link;

class GiftsListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'gifts' => Gift::all(),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'GiftView';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): array
    {
        return [
            Link::make('Create')
            ->icon('pencil')
            ->route('platform.gift.edit')
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::table('gifts', [
                TD::make('name', __('Name'))
                  ->sort()
                  ->filter(Input::make())
                  ->render(function (Gift $gift){
                    return Link::make($gift->name)
                        ->route('platform.gift.edit', $gift);
                  }),
                TD::make('description', __('Description'))
                  ->sort()
                  ->filter(Input::make())
                  ->render(function (Gift $gift){
                    return $gift->description;
                  }),
                TD::make('price', __('Price'))
                  ->sort()
                  ->filter(Input::make())
                  ->render(function (Gift $gift){
                    return $gift->price;
                  }),
                TD::make('category', __('Category'))
                  ->sort()
                  ->filter(Input::make())
                  ->render(function (Gift $gift){
                    return $gift->category;
                  }),
                TD::make('material', __('Material'))
                  ->sort()
                  ->filter(Input::make())
                  ->render(function (Gift $gift){
                    return $gift->material;
                  }),
            ])
        ];
    }
}

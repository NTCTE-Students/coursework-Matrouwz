<?php

namespace App\Orchid\Screens;

use App\Models\Gift;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;
use App\Models\Doctor;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Alert;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Cropper;

class GiftsEditScreen extends Screen
{
    public $gift;
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Gift $gift): iterable
    {
        return [
        'gift' => $gift];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->gift->exists ? 'Edit gift' : 'Creating a new gift';
    }

    /**
     * The screens action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): array
    {
        return [
            Button::make('Create service')
                ->icon('pencil')
                ->method('createOrUpdate')
                ->canSee(!$this->gift->exists),

            Button::make('Update')
                ->icon('note')
                ->method('createOrUpdate')
                ->canSee($this->gift->exists),

            Button::make('Remove')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->gift->exists),
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
            Layout::rows([
                Input::make('gift.name')
                    ->title('Name'),
                Input::make('gift.description')
                    ->title('Description'),
                Input::make('gift.price')
                    ->title('Price'),
                Input::make('gift.category')
                    ->title('Category'),
                Input::make('gift.material')
                    ->title('material'),
            ])
        ];
    }

    public function createOrUpdate(Request $request)
    {
        $this->gift->fill($request->get('gift'))->save();

        Alert::info('You have successfully created a gift.');

        return redirect()->route('platform.gifts');
    }

    public function remove()
    {
        $this->gift->delete();

        Alert::info('You have successfully deleted the gift.');

        return redirect()->route('platform.gifts');
    }
}

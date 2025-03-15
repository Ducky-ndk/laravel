<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Sport Classes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Sport Classes') }}
                            </h2>
                        </header>


                        <table class="table-auto w-full text-left text-gray-900 dark:text-gray-100">
                            <thead>
                            <tr>
                                <th class="px-4 py-2"></th>
                                <th class="px-4 py-2">Name</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody class="text-gray-900 dark:text-gray-100">
                            @foreach ($sport_classes as $sport_class)
                                <tr>
                                    <td></td>
                                    <td class="px-4 py-2">{{ $sport_class->name }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('sport-classes.edit', [ $sport_class->id]) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('GET') }}

                                            <div class="form-group">
                                                <input type="submit" class="btn btn-danger delete-user" value="{{ __('Edit') }}">
                                            </div>
                                        </form>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('sport-classes.destroy', [ $sport_class->id]) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <div class="form-group">
                                                <input type="submit" class="btn btn-danger delete-user" value="{{ __('Delete') }}">
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </section>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>

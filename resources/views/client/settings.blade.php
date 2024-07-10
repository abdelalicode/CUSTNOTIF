@extends('client.index')

@section('content')
    <h1 class="font-medium text-2xl">SETTINGS</h1>

    <div class="pl-[40%]">
        <h3 class="font-semibold text-xl">Your Notifications Preferences</h3>
        <hr class="my-4 text-gray-200">

        <h5 class="text-sm font-semibold">Notify Me In</h5>








        <div class="max-h-screen overflow-y-scroll">

            @if ($user->adminNotifications->isEmpty())
                <p class="text-gray-500 text-sm mt-4">No notifications at the moment.</p>
            @else
                @foreach ($user->adminNotifications as $group)
                    <div class="flex justify-between items-center mt-4 mr-8">
                        <div>
                            <h5 class="text-sm font-semibold">{{ ucfirst($group->name) }} notifications</h5>
                            <p class="text-gray-400 text-xs mt-1">{{ $group->description }}</p>
                        </div>
                    </div>

                    <div class="flex gap-24 mt-4 mb-6">
                        <label class="inline-flex items-center cursor-pointer gap-6">
                            <p class="text-xs">Push</p>
                            <input type="checkbox" class="sr-only peer" {{ $group->pivot->push_enabled ? 'checked' : '' }}
                                onchange="updateNotificationChannel({{ $group->id }}, 'push', this.checked)">
                            <div
                                class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-0 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-sky-700">
                            </div>
                        </label>

                        <label class="inline-flex items-center cursor-pointer gap-6">
                            <p class="text-xs">Email</p>
                            <input type="checkbox" class="sr-only peer" {{ $group->pivot->email_enabled ? 'checked' : '' }}
                                onchange="updateNotificationChannel({{ $group->id }}, 'email', this.checked)">
                            <div
                                class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-0 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-sky-700">
                            </div>
                        </label>
                    </div>
                @endforeach
            @endif

            <form id="notification-settings-form" action="{{ route('updateNotificationSettings') }}" method="POST"
                style="display: none;">
                @csrf
                <input type="hidden" name="group_id" id="group_id">
                <input type="hidden" name="channel_type" id="channel_type">
                <input type="hidden" name="enabled" id="enabled">
            </form>
        </div>





    </div>

    <script>
        function updateNotificationChannel(groupId, channelType, isEnabled) {
            document.getElementById('group_id').value = groupId;
            document.getElementById('channel_type').value = channelType;
            document.getElementById('enabled').value = isEnabled ? 1 : 0;
            document.getElementById('notification-settings-form').submit();
        }
    </script>
@endsection

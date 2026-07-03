<<x-layouts::auth :title="__('Log in')">

<div class="space-y-6">

    <form method="POST" action="{{ route('login.store') }}" class="space-y-6">

        @csrf

        <flux:input
            name="email"
            label="Email"
            type="email"
            :value="old('email')"
            required
            autofocus
        />

        <flux:input
            name="password"
            label="Password"
            type="password"
            required
            viewable
        />

        <flux:checkbox
            name="remember"
            label="Remember Me"
        />

        <flux:button
            type="submit"
            variant="primary"
            class="w-full bg-emerald-700 hover:bg-emerald-800">

            Login

        </flux:button>

    </form>

</div>

</x-layouts::auth>
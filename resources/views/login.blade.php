<x-layout>
    <form action="{{ route('login.post') }}" method="POST">
        @csrf
        <h2>Login to Your Account</h2>
        <div>
            <label>Email</label>
            <input type="email" name="email" required>
            </div>
            <div>
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit">Login</button>
            Lost your password? <a href="#">Click Here</a>
            Already have an account? <a href="{{ route('register')}}">Register</a>
    </form>
</x-layout>
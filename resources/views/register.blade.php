<x-layout>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <h2> Register Account</h2>
        <div>
            <label>First Name</label>
            <input type="text" name="first_name" required>
        </div>
        <div>
            <label>Last Name</label>
            <input type="text" name="last_name" required>
        </div>
        <div>
            <label>Email</label>
            <input type="email" name="email" required>
        </div>
        <div>
            <label>Address</label>
            <input type="text" name="address" id="address" placeholder="Type address or location" autocomplete="off">
<ul id="location-suggestions" style="border:1px solid #ccc; list-style:none; padding:0; margin:0;"></ul>

            
        </div>
        <div>
            <label>Phone Number 1</label>
            <input type="text" name="phone" required>
            <label>Phone Number 2</label>
            <input type="text" name="phone" required>
        </div>
        <div>
            <label>Password</label>
            <input type="password" name="password" required>
        </div>
        <div>
            <label>Confirm Password</label>
            <input type="password" name="password_confirmation" required>
        </div>
        <button type="submit">Register</button>
        Already have an account? <a href="{{ route('login') }}">Login</a>
    </form>
   
<script>
document.getElementById('address').addEventListener('input', async function() {
    const query = this.value;
    if (query.length < 2) return;

    const res = await fetch(`/locations/search?q=${query}`);
    const data = await res.json();

    const list = document.getElementById('location-suggestions');
    list.innerHTML = '';
    data.forEach(place => {
        const li = document.createElement('li');
        li.textContent = `${place.street}, ${place.ward}, ${place.district}`;
        li.style.padding = '8px';
        li.style.cursor = 'pointer';
        li.onclick = () => {
            document.getElementById('address').value = li.textContent;
            list.innerHTML = '';
        };
        list.appendChild(li);
    });
});
</script>
</x-layout>
@if (Auth::guard('web')->check())
    <p class='text-success'>You are logged in as USER</p>
    <form id='uitloggen-form' method='get' action='/logout'>
        <p><input type='submit' name='uitloggen' value='User Logout'></p>
    </form>    
@else
    <form id='inloggen-form' method='get' action='/login'>
        <p><input type='submit' name='uitloggen' value='User Login'></p>
    </form>    
@endif

@if (Auth::guard('admin')->check())
    <p class='text-success'>You are logged in as ADMIN</p>
    <form id='uitloggen-form' method='get' action='admin/logout'>
        <p><input type='submit' name='uitloggen' value='Admin Logout'></p>
    </form>    
@endif
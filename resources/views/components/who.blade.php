@if (Auth::guard('web')->check())
    <p>You are logged in as visitor {{ Auth::guard('web')->user()->name }}</p>
    <form id='uitloggen-form' method='get' action='/logout'>
        <p><input type='submit' name='uitloggen' value='User Logout'></p>
    </form>    
@else
    <form id='inloggen-form' method='get' action='/login'>
        <p><input type='submit' name='inloggen' value='User Login'></p>
    </form>    
@endif

@if (Auth::guard('admin')->check())
    <p>You are logged in as administrator {{ Auth::guard('admin')->user()->name }}</p>
    <form id='uitloggen-form' method='get' action='admin/logout'>
        <p><input type='submit' name='uitloggen' value='Admin Logout'></p>
    </form>    
@endif
# API builded for a job interview

So, here I made an API using Lumen.
This API has authentication system, this system is build whith JWT (Json Web Token) and has login, logout and time to expire the provided hash.

## Models and Data

Well, I had some troubles with the authentication because of the password, JWT has an automatically encoding system, because that, i've had to generate my password with this line
> \Illuminate\Support\Facades\Hash::make(your password);

than past it into the database.
## References
[https://jwt-auth.readthedocs.io/en/develop/quick-start/] official JWT documentations.

[https://iwader.co.uk/post/tymon-jwt-auth-with-lumen-5-2] This tutorial helped me alot, because the installation guide for Lumen on JWT official documentatios is kinda messed up and incomplete.


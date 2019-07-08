package com.example.mybeautybooking;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ProgressBar;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.NetworkError;
import com.android.volley.NoConnectionError;
import com.android.volley.ParseError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.ServerError;
import com.android.volley.TimeoutError;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;

public class ClientLoginActivity_ventes extends AppCompatActivity {
    private static final String TAG = "ClientLoginActivityResearch";
    private static final int REQUEST_SIGNUP = 0;
    public ArrayList<String> arrayList = new ArrayList<>();
    //ProgressBar progressBar;

    EditText emailText_Client;
    EditText passwordText_Client;
    Button loginButton_Client;
    Button signupLink_Client;
    TextView acceuil;

    private RequestQueue requestQueue;
    private static final String URL = "http://192.168.43.103/ProjetClient2/MyBeautyBookingServer-master/Login_Client.php";
    private StringRequest request;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_client_login_recherche);

//        progressBar = (ProgressBar) findViewById(R.id.progressbar);
//        progressBar.setVisibility(View.INVISIBLE);

        emailText_Client = (EditText) findViewById(R.id.input_email);
        passwordText_Client = (EditText) findViewById(R.id.input_password);
        loginButton_Client = (Button) findViewById(R.id.btn_login);
        loginButton_Client.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                login();
            }
        });


        requestQueue = Volley.newRequestQueue(this);

        acceuil=(TextView)findViewById(R.id.accueil);


        //faire des actions aux boutons et textView lors du click

        acceuil.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                Intent intent = new Intent(ClientLoginActivity_ventes.this, HomePage.class);
                startActivity(intent);
            }
        });
        signupLink_Client = (Button) findViewById(R.id.link_signup);
        signupLink_Client.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(getApplicationContext(), ClientSignupActivity_ventes.class);
                intent.addFlags(Intent.FLAG_ACTIVITY_NO_ANIMATION);
                startActivityForResult(intent, REQUEST_SIGNUP);
            }
        });

        // downloadJSON("http://192.168.43.22/test/stock_service.php");
    }

    public void login (){
        Log.d(TAG, "Login");

        if (!validate()) {
            onLoginFailed();
            return;
        }



        loginButton_Client.setEnabled(false);


        //progressBar.setVisibility(View.VISIBLE);

        String email = emailText_Client.getText().toString();
        String password = passwordText_Client.getText().toString();

        // TODO: Implement authentication logic here.


        request = new StringRequest(Request.Method.POST, URL, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                try {
                    // create json object with php reponse
                    JSONObject jsonObject = new JSONObject(response);

                    /*verification jsonphp reponse*/
                    if(jsonObject.names().get(0).equals("success")){
                        SharedPrefManager.getInstance(getApplicationContext())
                                .userLogin(
                                        jsonObject.getInt("id"),
                                        jsonObject.getString("name"),
                                        jsonObject.getString("firstname"),
                                        jsonObject.getString("email"),
                                        jsonObject.getString("password"),
                                        jsonObject.getString("phone"),
                                        jsonObject.getString("street"),
                                        jsonObject.getString("zip"),
                                        jsonObject.getString("city")

                                );
                        new android.os.Handler().postDelayed(
                                new Runnable() {
                                    public void run() {
                                        // onLoginSuccess
                                        onLoginSuccess();

                                        //progressBar.setVisibility(View.INVISIBLE);
                                    }
                                }, 100);
                    }else {

                        new android.os.Handler().postDelayed(
                                new Runnable() {
                                    public void run() {
                                        //  onLoginFailed
                                        onLoginFailed();
                                        //progressBar.setVisibility(View.INVISIBLE);
                                    }
                                }, 100);                    }

                } catch (JSONException e) {
                    e.printStackTrace();
                }


            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {

                if (error instanceof TimeoutError) { Toast.makeText(getApplicationContext(), "TimeoutError", Toast.LENGTH_LONG).show();}

                if ( error instanceof NoConnectionError) { Toast.makeText(getApplicationContext(), "NoConnectionError" ,Toast.LENGTH_LONG).show();}

                if (error instanceof AuthFailureError) {
                    Toast.makeText(getApplicationContext(), "AuthFailureError" ,Toast.LENGTH_LONG).show();}
                else if (error instanceof ServerError) {
                    Toast.makeText(getApplicationContext(), "ServerError", Toast.LENGTH_LONG).show(); }

                else if (error instanceof NetworkError) {
                    Toast.makeText(getApplicationContext(), "NetworkError", Toast.LENGTH_LONG).show(); }

                else if  (error instanceof ParseError) {
                    Toast.makeText(getApplicationContext(), "ParseError" ,Toast.LENGTH_LONG).show();}

            }
        }){
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                HashMap<String,String> hashMap = new HashMap<String, String>();
                hashMap.put("email",emailText_Client.getText().toString());
                hashMap.put("password",passwordText_Client.getText().toString());

                return hashMap;
            }
        };

        requestQueue.add(request);



    }

   /* @Override
    public void onBackPressed() {
        // Disable going back to the MainActivity
        moveTaskToBack(false);
    }*/

    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        if (requestCode == REQUEST_SIGNUP) {
            if (resultCode == RESULT_OK) {

                // TODO: Implement successful signup logic here
                // By default we just finish the Activity and log them in automatically
                this.finish();
            }
        }
    }

    public boolean validate() {
        boolean valid= true;

        String email = emailText_Client.getText().toString();
        String password = passwordText_Client.getText().toString();

        if (email.isEmpty() || !android.util.Patterns.EMAIL_ADDRESS.matcher(email).matches()) {
            emailText_Client.setError(getString(R.string.error_invalid_email));
            valid = false;
        } else {
            emailText_Client.setError(null);
        }

        /*if (password.isEmpty() || password.length() < 8) {
            passwordText_Client.setError(getString(R.string.error_invalid_password));
            valid = false;
        } else {
            passwordText_Client.setError(null);
        }*/

        // authentif(email, password);

        return valid;
    }


    public void onLoginFailed() {
        Toast.makeText(getBaseContext(), R.string.login_failed_msg, Toast.LENGTH_LONG).show();

        loginButton_Client.setEnabled(true);
    }

    /*access to client profil*/
    public void onLoginSuccess() {
        loginButton_Client.setEnabled(true);
        Intent intent = new Intent(ClientLoginActivity_ventes.this, VentesPriveesActivity.class);
        intent.setFlags(Intent.FLAG_ACTIVITY_NO_ANIMATION);
        startActivity(intent);
        finish();
    }
}

package com.example.mybeautybooking;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.Toast;

public class VentesPriveesActivity extends AppCompatActivity {

    Button logout;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_ventes_privees);

        logout = (Button) findViewById(R.id.btn_logout);

        logout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                finish();
                overridePendingTransition(0, 0);

                Toast.makeText(getBaseContext(), R.string.logout, Toast.LENGTH_LONG).show();

                Intent intent = new Intent(VentesPriveesActivity.this, ClientLoginActivity_ventes.class);
                startActivity(intent);
            }
        });

    }
}

package com.example.mybeautybooking.activity;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

import com.example.mybeautybooking.ClientLoginActivity_recherche;
import com.example.mybeautybooking.HomePage;
import com.example.mybeautybooking.R;

public class RepotoireBeautyActivity extends AppCompatActivity {

    Button connexionB;
    TextView tvAcuueil;
    Button search_Pro;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_repotoire_beauty);

        connexionB = (Button) findViewById(R.id.btn_connexion);
        tvAcuueil=(TextView)findViewById(R.id.accueil);
        connexionB.setOnClickListener(new View.OnClickListener() {
            @Override
        public void onClick(View v) {

            Intent intent = new Intent(RepotoireBeautyActivity.this, ClientLoginActivity_recherche.class);
            startActivity(intent);
        }
    });
        tvAcuueil.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                Intent intent = new Intent(RepotoireBeautyActivity.this, HomePage.class);
                startActivity(intent);
            }
        });

        search_Pro = (Button) findViewById(R.id.Button_Search);
        search_Pro.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                Intent intent = new Intent(RepotoireBeautyActivity.this, Formulaire.class);
                startActivity(intent);
            }
        });
}
}

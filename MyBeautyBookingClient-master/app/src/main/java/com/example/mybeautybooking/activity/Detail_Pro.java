package com.example.mybeautybooking.activity;

import android.Manifest;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.net.Uri;
import android.support.v4.app.ActivityCompat;
import android.support.v4.content.ContextCompat;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.TextView;

import com.example.mybeautybooking.HomePage;
import com.example.mybeautybooking.R;

import org.w3c.dom.Text;

import java.util.ArrayList;

public class Detail_Pro extends AppCompatActivity {
    TextView NomP;
    TextView Categorie;
    //final TextView Tel;
    TextView Ville ;
    TextView Lien;
    TextView Siret;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_detail__pro);

        Intent i = getIntent();
        ArrayList<Professionnel> list = (ArrayList<Professionnel>) i
                .getSerializableExtra("P_Clicked");


         NomP = (TextView) findViewById(R.id.nom);
         Categorie  = (TextView) findViewById(R.id.categorie);
         Ville = (TextView) findViewById(R.id.ville);

         Lien= (TextView) findViewById(R.id.lien);
         Siret = (TextView) findViewById(R.id.siret);


         final TextView Tel = (TextView) findViewById(R.id.tel);


        NomP.setText(list.get(0).getNom());
        Categorie.setText(list.get(0).getSpecialite());
        Ville.setText("Je me déplace à "+list.get(0).getVille()+" principalement et dans un rayon de "+list.get(0).getRayon()+" Km.");
        // Rayon.setText(""+list.get(0).getRayon());
        Lien.setText("Consultez mes tarifs et réalisations ici \n"+list.get(0).getDescription());
        Siret.setText("Siret établissement: "+list.get(0).getRegistre());

        Tel.setText(list.get(0).getNum_tel());

        Tel.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View arg0) {
                Intent callIntent = new Intent(Intent.ACTION_DIAL);
                callIntent.setData(Uri.parse("tel:"+ Tel.getText()));
                startActivity(callIntent);
            }
        });

    }

}

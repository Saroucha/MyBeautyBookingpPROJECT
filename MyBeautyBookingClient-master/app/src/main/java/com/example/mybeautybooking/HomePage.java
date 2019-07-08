package com.example.mybeautybooking;

import android.animation.ValueAnimator;
import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.view.animation.LinearInterpolator;
import android.widget.Button;
import android.widget.TextView;

import com.example.mybeautybooking.activity.Formulaire;
import com.example.mybeautybooking.activity.Formulaire_Connect;

public class HomePage extends AppCompatActivity {

    TextView pro,text1,text2,text3,text4;
    Button  vente,beaute;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home_page);
        pro=(TextView) findViewById(R.id.pro);
        vente=(Button)findViewById(R.id.vente);
        beaute=(Button)findViewById(R.id.repertoire);
        text1=(TextView)findViewById(R.id.first);
       // text2=(TextView)findViewById(R.id.second);
       // text3=(TextView)findViewById(R.id.third);
        //text4=(TextView)findViewById(R.id.quatre);
        final ValueAnimator animator = ValueAnimator.ofFloat(0.0f, 2.0f);
        animator.setRepeatCount(ValueAnimator.INFINITE);
        animator.setInterpolator(new LinearInterpolator());
        animator.setDuration(20000L);
     /*   animator.addUpdateListener(new ValueAnimator.AnimatorUpdateListener() {
            @Override
            public void onAnimationUpdate(ValueAnimator animation) {
                final float progress = (float) animation.getAnimatedValue();
                final float width = text1.getWidth();
                final float width2 = text2.getWidth();
                final float width3 = text3.getWidth();
                final float translationX = width * progress;
               // text1.setTranslationX(translationX);
              //  text2.setTranslationX(translationX-width);
             //   text3.setTranslationX(translationX+width);
            }
        });*/
        animator.start();
        //faire des actions aux boutons et textView lors du click
        pro.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                Intent intent = new Intent(HomePage.this, Login_pro.class);
                startActivity(intent);

            }
        });

        vente.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                Intent intent = new Intent(HomePage.this, ClientLoginActivity_ventes.class);
                startActivity(intent);
            }
        });

        beaute.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                Intent intent = new Intent(HomePage.this, Formulaire.class);
                startActivity(intent);
            }
        });


    }


}

package com.example.mybeautybooking.activity;


import android.os.Bundle;
import android.support.annotation.NonNull;
import android.support.annotation.Nullable;
import android.support.v4.app.Fragment;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import com.example.mybeautybooking.R;

import java.util.ArrayList;

public class ListProFragment_Connect extends Fragment {
    private ArrayList<Professionnel> Ap=new ArrayList<>();
    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.fragment_list_connect, container, false);
        RecyclerView recyclerView = (RecyclerView) view.findViewById(R.id.ListRecyclerViewPro);
        Bundle b = getArguments();
        Ap= (ArrayList<Professionnel>)b.getSerializable("lol");
        ListAdapter listAdapter = new ListAdapter(Ap);
        recyclerView.setAdapter(listAdapter);
        RecyclerView.LayoutManager layoutManager = new LinearLayoutManager(getActivity());
        recyclerView.setLayoutManager(layoutManager);
        return view;
    }
}

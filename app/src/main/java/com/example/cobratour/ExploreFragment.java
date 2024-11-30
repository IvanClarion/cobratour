package com.example.cobratour;

import android.os.Bundle;
import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;

public class ExploreFragment extends Fragment {

    @Nullable
    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        // Inflate the explore_1.xml layout in this fragment
        View view = inflater.inflate(R.layout.explore_1, container, false);

        // Set up button listener for the second_page_button
        Button secondPageButton = view.findViewById(R.id.second_page_button);
        secondPageButton.setOnClickListener(v -> {
            // Replace the fragment with ExploreFragment2 when button is clicked
            replaceFragment(new ExploreFragment2(), true);
        });

        // Set up button listener for the more_button
        Button moreButton = view.findViewById(R.id.more_button);
        moreButton.setOnClickListener(v -> {
            // Replace the fragment with MoreFragment when more_button is clicked
            replaceFragment(new MoreFragment(), true);
        });

        // Set up button listener for the map_button
        Button mapButton = view.findViewById(R.id.map_button);
        mapButton.setOnClickListener(v -> {
            // Replace the fragment with MapFragment when map_button is clicked
            replaceFragment(new MapFragment(), true);
        });

        // Set up button listener for the tech_hub_button
        Button techHubButton = view.findViewById(R.id.tech_hub_button);
        techHubButton.setOnClickListener(v -> {
            // Replace the fragment with TechHubFragment when tech_hub_button is clicked
            replaceFragment(new TechHubFragment(), true);
        });

        // Set up button listener for the phinma_hall_button
        Button phinmaHallButton = view.findViewById(R.id.phinma_hall_button);
        phinmaHallButton.setOnClickListener(v -> {
            // Replace the fragment with PhFragment when phinma_hall_button is clicked
            replaceFragment(new PhFragment1(), true);
        });

        // Set up button listener for the shahs_button
        Button shahsButton = view.findViewById(R.id.shahs_button);
        shahsButton.setOnClickListener(v -> {
            // Replace the fragment with PhFragment when phinma_hall_button is clicked
            replaceFragment(new ShahsFragment1(), true);
        });

        // Set up button listener for the pedro_button
        Button pedroButton = view.findViewById(R.id.pedro_button);
        pedroButton.setOnClickListener(v -> {
            // Replace the fragment with PhFragment when phinma_hall_button is clicked
            replaceFragment(new PedroFragment(), true);
        });

        // Set up button listener for the prof_lib_button
        Button prof_libButton = view.findViewById(R.id.prof_lib_button);
        prof_libButton.setOnClickListener(v -> {
            // Replace the fragment with PhFragment when phinma_hall_button is clicked
            replaceFragment(new ProfLibFragment(), true);
        });

        // Set up button listener for the finance_registrar_button
        Button finance_registrarButton = view.findViewById(R.id.registrar_button);
        finance_registrarButton.setOnClickListener(v -> {
            // Replace the fragment with PhFragment when phinma_hall_button is clicked
            replaceFragment(new FinanceRegistrarFragment(), true);
        });

        // Set up button listener for the gsd_button
        Button gsdButton = view.findViewById(R.id.gsd_button);
        gsdButton.setOnClickListener(v -> {
            // Replace the fragment with PhFragment when phinma_hall_button is clicked
            replaceFragment(new GsdFragment(), true);
        });

        // Set up button listener for the villa_button
        Button villaButton = view.findViewById(R.id.swu_villa_button);
        villaButton.setOnClickListener(v -> {
            // Replace the fragment with PhFragment when phinma_hall_button is clicked
            replaceFragment(new SwuVillaFragment(), true);
        });

        // Set up button listener for the student_life_button
        Button studentLifeButton = view.findViewById(R.id.student_life_button);
        studentLifeButton.setOnClickListener(v -> {
            // Replace the fragment with PhFragment when phinma_hall_button is clicked
            replaceFragment(new StudentLifeFragment(), true);
        });

        return view;
    }

    // Method to replace the fragment
    private void replaceFragment(Fragment fragment, boolean addToBackStack) {
        if (getActivity() != null) {
            MainActivity mainActivity = (MainActivity) getActivity();
            mainActivity.replaceFragment(fragment, addToBackStack);
        }
    }
}

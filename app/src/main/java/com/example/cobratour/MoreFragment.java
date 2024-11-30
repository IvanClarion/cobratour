package com.example.cobratour;

import android.os.Bundle;
import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;

public class MoreFragment extends Fragment {

    @Nullable
    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        // Inflate the explore_1.xml layout in this fragment
        View view = inflater.inflate(R.layout.more, container, false);

        // Set up button listener for the building_button
        Button buildingButton = view.findViewById(R.id.building_button);
        buildingButton.setOnClickListener(v -> {
            // Replace the fragment with MoreFragment when more_button is clicked
            replaceFragment(new ExploreFragment(), true);
        });

        // Set up button listener for the map_button
        Button mapButton = view.findViewById(R.id.map_button);
        mapButton.setOnClickListener(v -> {
            // Replace the fragment with MapFragment when map_button is clicked
            replaceFragment(new MapFragment(), true);
        });
        // Set up button listener for the feedback_button
        Button feedbackButton = view.findViewById(R.id.feedback_button);
        feedbackButton.setOnClickListener(v -> {
            // Replace the fragment with MapFragment when map_button is clicked
            replaceFragment(new FeedbackFragment(), true);
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

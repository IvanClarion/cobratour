package com.example.cobratour;

import android.os.Bundle;
import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;

public class TechHubFragment extends Fragment {

    @Nullable
    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        // Inflate the tech_hub1.xml layout
        View view = inflater.inflate(R.layout.tech_hub1, container, false);

        // Set up button listener for the second_page_button
        Button secondPageButton = view.findViewById(R.id.second_page_button);
        secondPageButton.setOnClickListener(v -> {
            replaceFragment(new TechHubFragment2(), true);
        });

        // Set up button listener for the third_page_button
        Button thirdPageButton = view.findViewById(R.id.third_page_button);
        thirdPageButton.setOnClickListener(v -> {
            replaceFragment(new TechHubFragment3(), true);
        });

        // Set up button listener for the back_button
        Button backButton = view.findViewById(R.id.back_button);
        backButton.setOnClickListener(v -> {
            replaceFragment(new ExploreFragment(), true); // Navigate back to ExploreFragment
        });

        return view;
    }

    private void replaceFragment(Fragment fragment, boolean addToBackStack) {
        if (getActivity() != null) {
            MainActivity mainActivity = (MainActivity) getActivity();
            mainActivity.replaceFragment(fragment, addToBackStack);
        }
    }
}

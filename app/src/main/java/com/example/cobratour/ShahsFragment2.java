package com.example.cobratour;

import android.os.Bundle;
import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;

public class ShahsFragment2 extends Fragment {

    @Nullable
    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        // Inflate the ph_1.xml layout
        View view = inflater.inflate(R.layout.shahs_2, container, false);

        // Setup button listeners for navigation
        Button firstPageButton = view.findViewById(R.id.first_page_button);
        firstPageButton.setOnClickListener(v -> replaceFragment(new ShahsFragment1()));

        Button thirdPageButton = view.findViewById(R.id.third_page_button);
        thirdPageButton.setOnClickListener(v -> replaceFragment(new ShahsFragment3()));

        Button fourthPageButton = view.findViewById(R.id.fourth_page_button);
        fourthPageButton.setOnClickListener(v -> replaceFragment(new ShahsFragment4()));

        // Set up the back button to navigate to ExploreFragment
        Button backButton = view.findViewById(R.id.back_button);
        backButton.setOnClickListener(v -> replaceFragment(new ExploreFragment()));

        return view;
    }

    // Helper method to replace fragment
    private void replaceFragment(Fragment fragment) {
        if (getActivity() != null) {
            MainActivity mainActivity = (MainActivity) getActivity();
            mainActivity.replaceFragment(fragment, true); // true to add to backstack
        }
    }
}

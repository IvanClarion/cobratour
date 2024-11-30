package com.example.cobratour;

import android.os.Bundle;
import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;

public class UnivLibFragment1 extends Fragment {

    @Nullable
    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        // Inflate the explore_1.xml layout in this fragment
        View view = inflater.inflate(R.layout.univ_lib_1, container, false);
        // Set up the back button to navigate to ExploreFragment

        Button secondPageButton = view.findViewById(R.id.second_page_button);
        secondPageButton.setOnClickListener(v -> replaceFragment(new UnivLibFragment2()));

        Button backButton = view.findViewById(R.id.back_button);
        backButton.setOnClickListener(v -> replaceFragment(new ExploreFragment2())); // Navigate back to ExploreFragment

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
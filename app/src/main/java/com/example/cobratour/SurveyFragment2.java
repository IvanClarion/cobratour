package com.example.cobratour;

import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.view.animation.Animation;
import android.view.animation.AnimationUtils;
import android.widget.Button;
import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;

public class SurveyFragment2 extends Fragment {

    @Nullable
    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        // Inflate the survey_2.xml layout in this fragment
        View view = inflater.inflate(R.layout.survey_2, container, false);

        // Set up button listeners
        Button exploreButton = view.findViewById(R.id.explore_button);
        Button findButton = view.findViewById(R.id.find_button);
        Button discoverButton = view.findViewById(R.id.discover_button);

        // Load the bounce animation
        Animation bounceAnimation = AnimationUtils.loadAnimation(getActivity(), R.anim.bounce);

        // Set up click listener for the buttons to apply the bounce animation and then navigate to the loading screen
        View.OnClickListener buttonClickListener = v -> {
            // Start the bounce animation
            v.startAnimation(bounceAnimation);

            // Navigate to the loading screen after the bounce effect with a slight delay (400 ms)
            v.postDelayed(this::navigateToLoadingScreen, 400);
        };

        exploreButton.setOnClickListener(buttonClickListener);
        findButton.setOnClickListener(buttonClickListener);
        discoverButton.setOnClickListener(buttonClickListener);

        return view;
    }

    // Method to navigate to loading screen
    private void navigateToLoadingScreen() {
        MainActivity activity = (MainActivity) getActivity(); // Get the activity
        if (activity != null) {
            activity.replaceFragment(new LoadingFragment(), false); // Pass false to not add to back stack
        }
    }
}

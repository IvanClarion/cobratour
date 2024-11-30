package com.example.cobratour;

import android.animation.ObjectAnimator;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.view.animation.Animation;
import android.view.animation.AnimationUtils;
import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;
import android.widget.ProgressBar;
import androidx.fragment.app.FragmentManager;

public class LoadingFragment extends Fragment {

    private ProgressBar progressBar;

    @Nullable
    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        // Inflate the loading_screen.xml layout in this fragment
        View view = inflater.inflate(R.layout.loading_screen, container, false);

        // Load the zoom-in-out animation
        Animation zoomAnimation = AnimationUtils.loadAnimation(getActivity(), R.anim.zoom_in_out);
        view.startAnimation(zoomAnimation);

        // Initialize the ProgressBar
        progressBar = view.findViewById(R.id.progressBar);

        // Start progress animation
        startProgressAnimation();

        return view;
    }

    // Method to start the progress animation
    private void startProgressAnimation() {
        ObjectAnimator progressAnimator = ObjectAnimator.ofInt(progressBar, "progress", 0, 100); // Animate from 0 to 100
        progressAnimator.setDuration(3000); // Duration of 3 seconds for the animation

        // Add a listener to listen for when the animation ends
        progressAnimator.addListener(new android.animation.AnimatorListenerAdapter() {
            @Override
            public void onAnimationEnd(android.animation.Animator animation) {
                super.onAnimationEnd(animation);
                // Navigate to the ExploreFragment
                navigateToExploreFragment();
            }
        });

        progressAnimator.start();
    }

    // Method to navigate to ExploreFragment
    private void navigateToExploreFragment() {
        FragmentManager fragmentManager = getActivity().getSupportFragmentManager();
        ExploreFragment exploreFragment = new ExploreFragment(); // Create an instance of the ExploreFragment

        // Use a FragmentTransaction to replace the current fragment with ExploreFragment
        fragmentManager.beginTransaction()
                .replace(R.id.fragment_container, exploreFragment) // Replace with your container ID
                .addToBackStack(null) // Add to back stack if you want to go back
                .commit(); // Commit the transaction
    }
}

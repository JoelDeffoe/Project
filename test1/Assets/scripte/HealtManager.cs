using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class HealtManager : MonoBehaviour {

    public int maxHealth;
    public int currenetHealth;

    public playerControl thePlayer;

    public float invinciblityLength;
    private float invicibilityCounter;

    public Renderer playerRenderer;
    private float flashCounter;
    public float flacheLength =0.1f;

	// Use this for initialization
	void Start () {
        currenetHealth = maxHealth;

        thePlayer = FindObjectOfType<playerControl>();
	}
	
	// Update is called once per frame
	void Update () {
        if (invicibilityCounter > 0)
        {
            invicibilityCounter -= Time.deltaTime;
            flashCounter -= Time.deltaTime;

            if (flashCounter <= 0)
            {
                playerRenderer.enabled = !playerRenderer.enabled;
                flashCounter = flacheLength;
            }
            if (invicibilityCounter <= 0)
            {
                playerRenderer.enabled = true;
            }
        }
	}

    public void HurtPlayer(int damage, Vector3 direction)
    {
        if (invicibilityCounter <= 0)
        {
            currenetHealth -= damage;
            thePlayer.Knockback(direction);

            invicibilityCounter = invinciblityLength;

            playerRenderer.enabled = false;
            flashCounter = flacheLength;
        }
    }

    public void HealPlayer(int healAmount)
    {
        currenetHealth += healAmount;
        if (currenetHealth > maxHealth)
        {
            currenetHealth = maxHealth;

        }
    }

}
